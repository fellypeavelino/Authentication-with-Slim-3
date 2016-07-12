<?

namespace App\Controllers;

use Slim\Views\Twig as View;

class HomeController extends Controller{

	public function index($request,$response){
		//return "Home controller";
		//$this->db->table('users')->where('id',1);
		$user = $this->db->table('users')->find(1);
		var_dump($user);
		return $this->view->render($response,'home.twig');
	}

}