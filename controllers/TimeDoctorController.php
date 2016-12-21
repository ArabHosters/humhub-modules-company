<?php

class TimeDoctorController extends Controller {

    public $subLayout = "_layout";
    public $defaultAction = 'worklog';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
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

    public function getTimedoctortoken() {

        Yii::import('ext.oauth2.OAuth2');

        $config = require Yii::getPathOfAlias('ext.oauth2') . '/config.php';

        $provider = 'Timedoctor';
        $config[$provider]['redirect_uri'] = 'site/auth';
        if (!isset($config[$provider])) {
            throw new CHttpException('invalid request.');
        }

        try {
            $oauth2 = OAuth2::create($provider, $config[$provider]);
        } catch (OAuth2_Exception $e) {
            throw new CHttpException($e->getMessage());
        }

        $user = Profile::model()->findByAttributes(array('user_id' => Yii::app()->user->id));

        if ($user->timedoctor_token) {
            $token = new OAuth2_Token;
            $token->access_token = $user->timedoctor_token;
            $token->user_id = $user->timedoctor_user_id;
            $token->expires_in = 432000;
            return $token;
        } else {
            $oauth2->redirect();
        }
    }

    public function actionWorklog($start_date = '', $end_date = '', $owner_id = '') {
        $worklog = array();
        $attendance = array();

        if ($start_date == '' || $end_date == '') {
            Yii::app()->user->setFlash('worklognotice', 'Please Select Start and End Date to view your worklog');
        } else {
            if ($owner_id == '') {
                $user_id = Yii::app()->user->id;
            } else {
                $user_id = $owner_id;
            }
            $attendance = Attendance::model()->findAll(array(
                'condition' => "user_id = :user_id AND DATE_FORMAT( in_time,  '%Y-%m-%d' )  BETWEEN :date1 AND :date2 AND out_time != '0000-00-00 00:00:00' AND status = 'Approved'",
                'params' => array(
                    ':user_id' => $user_id,
                    ':date1' => $start_date,
                    ':date2' => $end_date,
                )
            ));

            Yii::import('ext.oauth2.OAuth2');

            $config = require Yii::getPathOfAlias('ext.oauth2') . '/config.php';

            $provider = 'Timedoctor';
            $config[$provider]['redirect_uri'] = 'site/auth';
            if (!isset($config[$provider])) {
                throw new CHttpException('invalid request.');
            }

            try {
                $oauth2 = OAuth2::create($provider, $config[$provider]);
            } catch (OAuth2_Exception $e) {
                throw new CHttpException($e->getMessage());
            }
            $token = $this->getTimedoctortoken();
            if ($owner_id == '') {
                $owner_id = $token->user_id;
                $worklog = $oauth2->getworklogs($token, $start_date, $end_date, $owner_id);
            } else {
                $user = Profile::model()->findByAttributes(array('user_id' => $owner_id));
                if (isset($user->timedoctor_user_id)) {
                    $owner_id = $user->timedoctor_user_id;
                    $worklog = $oauth2->getworklogs($token, $start_date, $end_date, $owner_id);
                } else {
                    $worklog['error'] = 'No timedoctor for this user';
                    $worklog['description'] = 'No timedoctor for this user';
                }
            }
            $download = Yii::app()->request->getParam('download');
            if ($download) {
                if ($download == 1) {
                    $items = $worklog['worklogs']['items'];
                    Yii::app()->request->sendFile('worklog-' . date('YmdHis') . '.xls', $this->renderPartial('excelWorklog', array(
                                'model' => $items
                                    ), true)
                    );
                } else {
                    Yii::app()->request->sendFile('attendance-' . date('YmdHis') . '.xls', $this->renderPartial('excelAttendance', array(
                                'model' => $attendance
                                    ), true)
                    );
                }
            }
        }
        $this->render('worklog', array(
            'worklog' => $worklog,
            'attendance' => $attendance
        ));
    }

    public function actiondownloadWorklog() {
        Yii::import('ext.oauth2.OAuth2');

        $config = require Yii::getPathOfAlias('ext.oauth2') . '/config.php';

        $provider = 'Timedoctor';
        $config[$provider]['redirect_uri'] = 'site/auth';
        if (!isset($config[$provider])) {
            throw new CHttpException('invalid request.');
        }

        try {
            $oauth2 = OAuth2::create($provider, $config[$provider]);
        } catch (OAuth2_Exception $e) {
            throw new CHttpException($e->getMessage());
        }
        $token = $this->getTimedoctortoken();
        $start_date = Yii::app()->request->getParam('start_date');
        $end_date = Yii::app()->request->getParam('end_date');
        $owner_id = Yii::app()->request->getParam('owner_id');
        if ($owner_id == '') {
            $owner_id = $token->user_id;
            $worklog = $oauth2->getworklogs($token, $start_date, $end_date, $owner_id);
        } else {
            $user = Profile::model()->findByAttributes(array('user_id' => $owner_id));
            if (isset($user->timedoctor_user_id)) {
                $owner_id = $user->timedoctor_user_id;
                $worklog = $oauth2->getworklogs($token, $start_date, $end_date, $owner_id);
            } else {
                $worklog['error'] = 'No timedoctor for this user';
                $worklog['description'] = 'No timedoctor for this user';
            }
        }

        Yii::app()->request->sendFile('accounts-' . date('YmdHis') . '.xls', $this->renderPartial('excelAccounts', array(
                    'model' => $worklog
                        ), true)
        );
    }

    public function actionIndex() {
        Yii::import('ext.oauth2.OAuth2');

        $config = require Yii::getPathOfAlias('ext.oauth2') . '/config.php';

//        $provider = 'Timedoctor';
//        if (!isset($config[$provider])) {
//            throw new CHttpException('invalid request.');
//        }
//
//        try {
//            $oauth2 = OAuth2::create($provider, $config[$provider]);
//        } catch (OAuth2_Exception $e) {
//            throw new CHttpException($e->getMessage());
//        }
//        $token = $this->getTimedoctortoken();
//        $worklog = $oauth2->createTask($token, 'demo rize', '217597');
//        dump($worklog);
//        exit;
        $this->render('index');
    }

    public function actionSync() {
        $this->subLayout = "application.modules_core.admin.views._layout";
        Yii::import('ext.oauth2.OAuth2');

        $config = require Yii::getPathOfAlias('ext.oauth2') . '/config.php';

        $provider = 'Timedoctor';
        $config[$provider]['redirect_uri'] = 'site/auth';
        if (!isset($config[$provider])) {
            throw new CHttpException('invalid request.');
        }

        try {
            $oauth2 = OAuth2::create($provider, $config[$provider]);
        } catch (OAuth2_Exception $e) {
            throw new CHttpException($e->getMessage());
        }
        $token = $this->getTimedoctortoken();
        $userInfo = $oauth2->getUserInfo($token);
        $projects = $oauth2->getProjects($token);
        $this->render('sync', array('userInfo' => $userInfo, 'projects' => $projects));
    }

    public function actionAdmin($start_date = '', $end_date = '') {
        $worklog = array();
        if ($start_date == '' || $end_date == '') {
            Yii::app()->user->setFlash('worklognotice', 'Please Select Start and End Date to view your worklog');
        } else {
            Yii::import('ext.oauth2.OAuth2');

            $config = require Yii::getPathOfAlias('ext.oauth2') . '/config.php';

            $provider = 'Timedoctor';
            if (!isset($config[$provider])) {
                throw new CHttpException('invalid request.');
            }

            try {
                $oauth2 = OAuth2::create($provider, $config[$provider]);
            } catch (OAuth2_Exception $e) {
                throw new CHttpException($e->getMessage());
            }
            $token = $this->getTimedoctortoken();
            $worklog = $oauth2->getworklogs($token, $start_date, $end_date);
        }
        $this->render('worklog', array(
            'worklog' => $worklog,
        ));
    }

}
