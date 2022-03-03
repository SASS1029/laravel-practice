<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //忘れずに　\\\\\ option & ¥（右上）

class PostController extends Controller
{      

    //Propaties
    private $post;
        //$post = new Post ($this)
    //Methods

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    // public function index() { //backend routes web.phpのRoute::get('/post' , [PostController::class, 'index']);からきた
    //     return "Post Controller: This is the index method.";
    // }

    // public function viewPost($post_id) { // Route::get('/view-post/{post_id}', [PostController::class, 'viewPost']);
    //     return "Post Controller: This is Post $post_id.";
    // }

    public function viewPosts($username,$post_id){ //３からきた
        return "Post Controller: Post $post_id. This is the post of $username.";
    }



    // public function viewAllPosts() {//4、６
    //     return view('view-all'); //resources/viewsのview-all.blade.phpに行く　　includeは必要なし
    // }

    public function viewPost($username,$post_id) {//ワンラインだがこっちの方が見やすい
        return view('view-post') //view-post.blade.phpへ
                ->with('post_id' , $post_id)
                ->with('username' , $username);
    }

    // public function show($username) {   //activity1   
    //     $username = strtoupper($username);
    //     return "Hello $username!"  ;
    // }

    public function viewAllPosts() { //7  //引数はいらない？
        $post_titles = [
            'Python vs Java ',
             'The Cloud', 
            'How To Stay Productive',
            'Coding during a pandemic' ];

        return view('view-all')->with('post_titles' , $post_titles);
    }

    public function show($username ) {
        // ucwords() - uppercase the first letter of all words
        //  ucfirst() - uppercase the first letter
        $username = ucwords($username);
        $post_titles  = [
            'How to Make French Toast',
            'Japanese Cheesecake Recipe',
            'How to Cook Steak',
            'The Best Places in Tokyo for Shokupan Bread',
            'Cambodian Style Fried Chicken Wings'
        ];
        return view('show')
                ->with('post_titles' , $post_titles)
                ->with('username' , $username);

    }



// Model Eloquent　を使ったデータベース、CRUD
    public function store() { //
        //Create an instance of Post model
        $post = new Post; // app/model/Post.php のclass Post extends Modelから来た

        //Assign a string value to the title and content attributes of Post model instance($post)
        $post->title ="Laravel 9 Release Schedule";// migrationで作ったtitleとcontentカラムに入る予定
        $post->content ="As you may know, we updated the Laravel release cycle to include one major releate per year.";

        //Use Eloquent's save method.
        $post->save();  //CRUDのcreateにあたる　　今回はこっち使う
    }


    public function storeCreate() {
        $new_post = [
            'title'=>'Laravel 10 Release Schedule',
           'content'=>'As you may know, we updated the Laravel release cycle to include one major releate per year.1'
        ];

        Post::create($new_post);  //同じくCRUDのcreate mass assifnmentが必要
    }

    // public function index() {
    //     // $post = new Post;
    //     $all_posts = $post->all();  //CRUDのreadにあたる
    //     foreach($all_posts as $post) {
    //         echo "TITLE: $post->title";
    //         echo "<br>";
    //         echo $post->content;
    //         echo "<br><br>";
    //     }     
    // }

    public function index() {
        // $post = new Post;
        $all_posts = Post::get();//all 上一行なし　　同じくCRUDのread
        foreach($all_posts as $post) {
            echo "TITLE: $post->title";
            echo "<br>";
            echo $post->content;
            echo "<br><br>";
        }     
    }

    public function index1($post_id) {
        $post = Post::findOrFail($post_id); //CRUDのread でも一つのみ/find()同じだがデータがないところになるとエラーになる。finOrFailはnot foundになる
 
        echo "TITLE: $post->title";
            echo "<br>";
            echo $post->content;
    }


    // public function index1($post_id) {
    //     $post_obj = new Post;
    //     $post = $post_obj->FindOrFail($post_id);
    //     //$post = Post::FindOrFail($post_id)上なし（new)
    //     echo "TITLE: $post->title";
    //         echo "<br>";
    //         echo $post->content; //echo return ブラウザ表示
    // }

    public function showWhere($post_id) { //スライドに他にもあるが基本的にfindOrFailを使う
        $post = Post::where('id' , $post_id)->get(); //これもCRUDのread
        foreach($post as $p) {
            echo "TITLE: $p->title";
            echo "<br>";
            echo $p->content;

       }
    }

    public function update($post_id) { //ブランク　何も表示されないがDBがアップデートされている deleteも
                                                     // $post_obj = new Post;
        $post = $this->post->findOrFail($post_id);
                                                     // $post = Post::findOrFail($post_id);
        $post->title = "NEW TITLE";
        $post->content = "NEW CONTENT";
        $post->save();
    }

    public function destroy($post_id) {
                                                         // $post_obj = new Post;
        $this->post->findOrFail($post_id)->delete();//constructorが作用している場合

                                                        //Post::destroy(3,10,7);
                                                        //$ids = [3,10,7];   Post::destroy($ids);
                                                    
    }



    

}
