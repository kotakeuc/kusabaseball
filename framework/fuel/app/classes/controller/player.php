<?php

class Controller_Player extends Controller {

    public function action_index() {

        $data = array();
        $data['rows'] = Model_Post::find_all();

        // データベースが空の時の処理
        if (!$data['rows']) {
            $data['rows'][0] = array( 'player_id'  => 0,
                                      'team_name'  => 'チームがまだ登録されていません',
                                      'back_number'=> 000,
                                      'player_name'=> '選手名がまだ登録されていません' );
        }

        $view = View::forge('player/top', $data);

        $user_form = Fieldset::forge('user_form');

        $user_form->add('team_name' , 'チーム名')->add_rule('required');
        $user_form->add('back_number', '背番号')->add_rule('required');
        $user_form->add('player_name', '選手名')->add_rule('required');
        $user_form->add('submit', '', array('type' => 'submit', 'value' => '登録確認'));

        $view->set('form', $user_form->build(), false);

        return Response::forge($view);

    }

    public function action_check() {

var_dump($rows);
exit(0);

    }

    public function action_complete() {
    }
}
