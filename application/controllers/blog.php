<?php


Class Blog_Controller extends Base_Controller
{
	
	public $restful = true;


	// Show All Articles with Pagination
	public function get_index()
	{
		    $posts = Post::with('user')->order_by('updated_at', 'desc')->paginate(5);
    		return View::make('home')
        		->with('posts', $posts);
	}	



	// Show Article
	public function get_article($id)
	{
		    $user = Auth::user();
    		$view_post = Post::with('user')->find($id);
    		return View::make('edit')
            	->with('user', $user)
            	->with('post', $view_post);
	}



	// Post Article
	public function post_index()
	{
	    $new_post = array(
	        'post_title'    => Input::get('post_title'),
	        'post_body'     => Input::get('post_body'),
	        'post_author'   => Input::get('post_author')
	    );
	   
	    $rules = array(
	        'post_title'     => 'required|min:3|max:255',
	        'post_body'      => 'required|min:10'
	    );
	    
	    $validation = Validator::make($new_post, $rules);
	    if ( $validation -> fails() )
	    {
	        
	        return Redirect::to('admin')
	                ->with('user', Auth::user())
	                ->with_errors($validation)
	                ->with_input();
	    }
	    // create the new post after passing validation
	    $post = new Post($new_post);
	    $post->save();
	    // redirect to viewing all posts
	    return Redirect::to('/');
	}



	// Update Article
	public function put_index($id)
	{

			$post_title = Input::get('post_title');
		    $post_body = Input::get('post_body');
		    $post_author = Input::get('post_author');
		    $edit_post = array(
		        'post_title'    => $post_title,
		        'post_body'     => $post_body,
		        'post_author'   => $post_author
		    );
		   
		    $rules = array(
		        'post_title'     => 'required|min:3|max:255',
		        'post_body'      => 'required|min:10'
		    );
		    
		    $validation = Validator::make($edit_post, $rules);
		    if ( $validation -> fails() )
		    {
		        
		        return Redirect::to('post/'.$id)
		                ->with('user', Auth::user())
		                ->with_errors($validation)
		                ->with_input();
		    }
		    // save the post after passing validation
		    $post = Post::with('user')->find($id);
		    $post->post_title = $post_title;
		    $post->post_body = $post_body;
		    $post->post_author = $post_author;
		    $post->save();
		    // redirect to viewing all posts
		    return Redirect::to('/')->with('success_message', true);
	
	}



	// Delete Article
	public function delete_index($id)
	{
		    $delete_post = Post::with('user')->find($id);
    		$delete_post -> delete();
    		return Redirect::to('/')
            	->with('success_message', true);
	}


	
}