<?php


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $data['posts'] = $posts;
        self::CreateView('PostIndexView', $data);
    }

    public function create()
    {
        $authors = Author::all();
        $data['authors'] = $authors;
        self::CreateView('PostAddView', $data);
    }


    public function store($request)
    {
        Post::save($request['rid'], $request['pcontent']);
        $this->index();
    }

    public function edit($req)
    {
        $authors = Author::all();
        $post = Post::find($req['post_id']);
        $data['authors'] = $authors;
        $data['post'] = $post;
        self::CreateView('PostEditView', $data);
    }


    public function update($request)
    {

            $post = Post::update($request['pid'], $request['rid'], $request['pcontent']);
            if($post){
                $this->index();
            }else{
                $this->edit(['post_id'=>$request['pid']]);
            }
    }
}