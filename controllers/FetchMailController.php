<?php

class FetchMailController extends Controller {

    public $subLayout = '_layout';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function actions() {
        return array(
            'toggle' => 'ext.jtogglecolumn.ToggleAction',
            'switch' => 'ext.jtogglecolumn.SwitchAction', // only if you need it
            'qtoggle' => 'ext.jtogglecolumn.QtoggleAction', // only if you need it
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'users' => array('@', (HSetting::Get('allowGuestAccess', 'authentication_internal')) ? "?" : "@"),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }
    
    public function actionIndex() {
        $model = new Fetchmail();
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Fetchmail']))
            $model->attributes = $_GET['Fetchmail'];
        $this->render('index', array(
            'model' => $model,
        ));
    }

    public function actionArchive() {
        $model = new Fetchmail();
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Fetchmail']))
            $model->attributes = $_GET['Fetchmail'];
        $this->render('archive', array(
            'model' => $model,
        ));
    }

    public function actionSettings() {
        $form = new ImapMailingSettingsForm;
        $form->imapusername = HSetting::Get('imapusername', 'mailing');
        if (HSetting::Get('imappassword', 'mailing') != '')
            $form->imappassword = '---invisible---';

        // uncomment the following code to enable ajax-based validation
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'mailing-settings-form') {
            echo CActiveForm::validate($form);
            Yii::app()->end();
        }

        if (isset($_POST['ImapMailingSettingsForm'])) {

            $form->attributes = $_POST['ImapMailingSettingsForm'];

            if ($form->validate()) {
                $form->imapusername = HSetting::Set('imapusername', $form->imapusername, 'mailing');
                if ($form->imappassword != '---invisible---')
                    $form->imappassword = HSetting::Set('imappassword', $form->imappassword, 'mailing');

                // set flash message
                Yii::app()->user->setFlash('data-saved', Yii::t('AdminModule.controllers_SettingController', 'Saved'));

                $this->redirect(Yii::app()->createUrl('//company/fetchMail/settings'));
            }
        }

        $this->render('mailing_server', array('model' => $form));
    }

    public function actionShow($id) {
        $email = Fetchmail::model()->findByPk($id);
        $criteria = new CDbCriteria();
        $criteria->order = "created_at DESC";
        $criteria->condition = "object_id=:id";
        $criteria->params = array(':id' => $id);
        $comments = array_reverse(FetchmailComment::model()->findAll($criteria));

        $this->renderPartial('view', array('comments' => $comments, 'id' => $id, 'email' => $email), false, true);
    }

    public function actionReview($id) {
        $email = Fetchmail::model()->findByPk($id);
        $criteria = new CDbCriteria();
        $criteria->order = "created_at DESC";
        $criteria->condition = "object_id=:id AND created_by=:user ";
        $criteria->params = array(':id' => $id, ':user' => Yii::app()->user->id);
        $comments = array_reverse(FetchmailComment::model()->findAll($criteria));

        $this->renderPartial('review', array('comments' => $comments, 'id' => $id, 'email' => $email), false, true);
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return LeaveTypes the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Fetchmail::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionGrap() {
        $this->renderPartial('grap', array(), false, true);
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $mail = $this->loadModel($id);
        if($mail->archived == 1){
            $mail->archived = 0;
        }else{
            $mail->archived = 1;
        }
        $mail->save();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    public function actionRestore($id) {
        $mail = $this->loadModel($id);
        $mail->archived = 0;
        $mail->save();
        // if AJAX request, we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(Yii::app()->request->urlReferrer);
    }

    public function actionPost() {
        $this->forcePostRequest();

        $message = Yii::app()->request->getParam('message', "");
        $message = Yii::app()->input->stripClean(trim($message));
        $model_id = Yii::app()->request->getParam('contentId', "");
        $approved_status = Yii::app()->request->getParam('approved_status', "");

        if ($message != "" && !Yii::app()->user->isGuest) {

            $comment = new FetchmailComment;
            $comment->message = $message;
            $comment->object_model = 'Fetchmail';
            $comment->object_id = $model_id;
            $comment->save();
            $mail = $this->loadModel($model_id);
            $mail->approved = $approved_status;
            $mail->save();
            File::attachPrecreated($comment, Yii::app()->request->getParam('fileList'));

            // Reload comment to get populated created_at field
            $comment = FetchmailComment::model()->findByPk($comment->id);

            $output = $this->widget('application.modules.company.widgets.ShowMailWidget', array(
                'comment' => $comment,
                'justEdited' => true
                    ), true);
            Yii::app()->clientScript->render($output);
            echo $output;
        }
    }

}
