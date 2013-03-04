<?php

class Controller_Player extends Controller {

    public function action_index() {

        // 全てのパラメータが揃っていたら登録処理(変更予定)
        if ( isset($_POST['team_name']) && isset($_POST['player_name']) && isset($_POST['back_number']) && is_numeric($_POST['back_number'])) {

            $data['rows'] = array();
            $data['rows'][0]['team_name']   = $_POST['team_name'];
            $data['rows'][0]['back_number'] = $_POST['back_number'];
            $data['rows'][0]['player_name'] = $_POST['player_name'];

            $view = View::forge('player/check', $data);

            $user_form = Fieldset::forge('check_form');
            $user_form->add('submit', '', array('type' => 'submit', 'value' => '登録する'));

            $view->set('form', $user_form->build('player/check'), false);
            return Response::forge($view);

        }

        $data = array();
        $data['rows'] = Model_Post::find_all();

        // データベースが空の時の処理
        if (!$data['rows']) {
            $data['rows'][0] = array( 'player_id'  => 0,
                                      'team_name'  => 'チームがまだ登録されていません',
                                      'back_number'=> 000,
                                      'player_name'=> '選手名がまだ登録されていません' );
        }

        $view = View::forge('player/index', $data);

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

        // Model_Postクラスのオブジェクトを作成する
/*
        $post = Model_Post::forge();

        $row = array();
        $row['team_name']   = $_POST['team_name'];
        $row['back_number'] = $_POST['back_number'];
        $row['player_name'] = $_POST['player_name'];

        $post->set($row);
        $result = $post->save();
*/
echo "OK";
        $view = View::forge('player/index');
        $user_form = Fieldset::forge('user_form');
        $user_form->add('submit', '', array('type' => 'submit', 'value' => '登録する'));
        $view->set('form', $user_form->build(), false);
        return Response::forge($view);

    }


}

?>
