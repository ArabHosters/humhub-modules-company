<?php

class FeedbackController extends Controller {

    public function actionIndex() {
        $feedback = new UserFeedback;
        if (isset($_POST['UserFeedback'])) {
            $feedback->attributes = $_POST['UserFeedback'];
            $feedback->user_id = Yii::app()->user->id;
            $details = '';
            $request = Yii::app()->request;
            $details .= 'Generated From: ' . $request->urlReferrer . ' <br/> ';
            $details .= 'User Agent: ' . $request->userAgent . ' <br/> ';
            $details .= 'User IP: ' . $request->userHostAddress . ' <br/> ';
            $feedback->feedback_details = $details;
            //$feedback->save();
            if ($feedback->save()) {
                $ch = curl_init();

                $headers = array(
                    'Authorization' => "Bearer eyJ1c2VyX2F1dGhlbnRpY2F0aW9uX2lkIjozOX0:1Znw7N:92iKnGq9f4_dNPdhmzUWArMdjSQ",
                    //'Content-Type' => 'application/json'
                );

                $url = 'http://tasks.serversadmins.com/api/v1/issues';
                $details .= 'User Comment: <br/> ' .$feedback->feedback_comment . ' <br/> ';
                $data = array(
                    'project' => '14',
                    'assigned_to' => '50',
                    'subject' => 'Rizeone Feedback',
                    'description' => $details,
                );
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                //$url = $this->createUrl($apiurl, $data);

                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);

                if ($headers) {
                    $_headers = array();
                    foreach ($headers as $k => $v) {
                        $_headers[] = $k . ': ' . $v;
                    }
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $_headers);
                }

                $response = curl_exec($ch);
                curl_close($ch);
            }
            $this->renderModalClose();
        }
        $this->renderPartial('index', array('feedback' => $feedback), false, true);
    }

    /**
     * create url
     * @param  string $url url
     * @param  array $params query params
     * @return string url
     */
    protected function createParamUrl($url, $params = array()) {
        if ($params) {
            $url .= (strpos($url, '?') !== FALSE ? '&' : '?' ) . http_build_query($params);
        }
        return $url;
    }

}
