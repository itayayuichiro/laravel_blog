<?php
use Illuminate\Database\Seeder;
use App\Menu;

class MenusSeeder extends Seeder{

	public function run(){
		$data = array(
			array("title"=>'トリュフ風きも焼',"price"=>230,"category"=>'フェアメニュー',"description"=>'あの食材がなんと230円！肝との相性も抜群。絶対に注文したい一品！'),
			array("title"=>'もも貴族焼（たれ）',"price"=>250,"category"=>'焼鳥',"description"=>'人気No.1！名物貴族焼！やわらかな新鮮もも肉とネギの旨味を秘伝のたれが引き立てます。'),
			array("title"=>'トリキの唐揚',"price"=>270,"category"=>'逸品料理',"description"=>'淡路島産玉ネギを使用したオニオンスパイスでしっかりと味付け。ビールのお供にぴったりです')
		);
		for( $i = 0 ; $i < 3 ; $i++) {
			$menu = new Menu;
			$menu->title = $data[$i]["title"];
			$menu->price = $data[$i]["price"];
			$menu->description = $data[$i]["description"];
			$menu->image_base64 = base64_encode(file_get_contents('./database/seeds/images/'.($i+1).'.jpg'));
			$menu->save();
		}

	}
}