<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Relation;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class RelationController.
 *
 * @author  The scaffold-interface created at 2017-03-19 11:23:36am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class RelationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - relation';
        $relations = Relation::paginate(6);
        return view('relation.index',compact('relations','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - relation';
        
        return view('relation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $relation = new Relation();

        
        $relation->name = $request->name;

        
        $relation->slug = $request->slug;

        
        $relation->isactive = $request->isactive;

        
        
        $relation->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new relation has been created !!']);

        return redirect('relation');
    }

    /**
     * Display the specified resource.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id,Request $request)
    {
        $title = 'Show - relation';

        if($request->ajax())
        {
            return URL::to('relation/'.$id);
        }

        $relation = Relation::findOrfail($id);
        return view('relation.show',compact('title','relation'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - relation';
        if($request->ajax())
        {
            return URL::to('relation/'. $id . '/edit');
        }

        
        $relation = Relation::findOrfail($id);
        return view('relation.edit',compact('title','relation'  ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $relation = Relation::findOrfail($id);
    	
        $relation->name = $request->name;
        
        $relation->slug = $request->slug;
        
        $relation->isactive = $request->isactive;
        
        
        $relation->save();

        return redirect('relation');
    }

    /**
     * Delete confirmation message by Ajaxis.
     *
     * @link      https://github.com/amranidev/ajaxis
     * @param    \Illuminate\Http\Request  $request
     * @return  String
     */
    public function DeleteMsg($id,Request $request)
    {
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/relation/'. $id . '/delete');

        if($request->ajax())
        {
            return $msg;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     	$relation = Relation::findOrfail($id);
     	$relation->delete();
        return URL::to('relation');
    }
}
