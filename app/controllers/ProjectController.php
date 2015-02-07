<?php

class ProjectController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		$content['project'] = Project::find(1);
        $content['files'] = Object::LoadFromDisk(1);
		//return Redirect::to('/projects');
        return View::make('repository.project.list', $content);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
//		$content['project'] = Project::find(1);
        return View::make('repository.projects.create');
     //   dd("create");
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$project = new Project();
		$project->fill(Input::all());
		$project->save();
		return Redirect::to('/projects');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
       //$content['files'] = Object::LoadFromDisk($id);
       //$content['page']['header'][] = "Такой то проект"; 
       //$content['page']['header'][] = "Список файлов"; 
       return View::make('repository.project.show')->with('project', Project::find($id));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function listdoc($id)
	{
       //$content['files'] = ;
       $content['page']['header'][] = "Такой то проект"; 
       $content['page']['header'][] = "Список файлов"; 
       $content['project'] = Project::find($id);
       $content['listdoc'] =  $content['project']->object()
       												->orderBy('type', 'asc')
       												->get(); 

       return View::make('repository.project.listdoc', $content);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function browser($id)
	{
       //$content['files'] = ;
       $content['page']['header'][] = "Такой то проект"; 
       $content['page']['header'][] = "Список файлов"; 
       $content['project'] = Project::find($id);
      // $content['listdoc'] =  $content['project']->object()->get(); 
       $root =  $content['project']->object()->first()->findRoot(); 
       $treeRoot = $root->buildTree($root->findDescendants()->where('project_id', '=', $id)->get());
	   $html = $treeRoot->render(
        'ul',
        function ($node) {
            return '<li><span class="glyphicon glyphicon-chevron-right"></span>

            <a href="/object/'.$node->id.'">'.$node->title." (". $node->name .")". '</a>
            <span class="treesm">'. $node->type .'</span>
            {sub-tree}</li>';
        },
        TRUE
        );

        $content['tree'] = $html;
 		//echo $html;


       //dd(1);

      // $root = new Object();

      // $root->setAsRoot();

      // $root->save();

       return View::make('repository.project.browser', $content);
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function ulistdoc($id){
       return Project::ulist($id);
	}



	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('repository.projects.create')->with('project', Project::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//dd("update");
		$project = Project::findOrFail($id);
		$project->fill(Input::all());
		$project->save();
		return Redirect::to('/projects');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function save()
	{
		//
        dd("save");
	}




	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//

        dd("destroy");
	}


    public function ajax($slug){

        $str = mb_convert_encoding($slug, "cp1251", "utf-8");


        $path = storage_path().'/projects/1/'.$str;

        return Object::Signature($path);
    }



   	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function projects()
	{
		 $content['projects'] = Project::all();
		 $content['page']['header'] = "Список всех проектов";
         return View::make('repository.projects.projects', $content);
	}



}
