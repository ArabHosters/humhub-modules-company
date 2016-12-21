<?php

class ShowMailWidget extends HWidget {

    /**
     * @var Comment object to display
     */
    public $comment = null;

    /**
     * Indicates the reminder was just edited
     * 
     * @var boolean
     */
    public $justEdited = false;

    /**
     * Executes the widget.
     */
    public function run() {

        $user = $this->comment->user;

        $this->render('showcomment', array(
            'comment' => $this->comment,
            'user' => $user,
            'justEdited' => $this->justEdited,
                )
        );
    }

}

?>