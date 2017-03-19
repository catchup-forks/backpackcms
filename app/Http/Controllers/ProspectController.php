<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Prospect;
use Amranidev\Ajaxis\Ajaxis;
use URL;

use App\Lead;


/**
 * Class ProspectController.
 *
 * @author  The scaffold-interface created at 2017-03-19 11:26:55am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - prospect';
        $prospects = Prospect::paginate(6);
        return view('prospect.index',compact('prospects','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - prospect';
        
        $leads = Lead::all()->pluck('isactive','id');
        
        return view('prospect.create',compact('title','leads'  ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prospect = new Prospect();

        
        $prospect->title = $request->title;

        
        $prospect->isactive = $request->isactive;

        
        $prospect->nextactiondate = $request->nextactiondate;

        
        
        $prospect->lead_id = $request->lead_id;

        
        $prospect->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new prospect has been created !!']);

        return redirect('prospect');
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
        $title = 'Show - prospect';

        if($request->ajax())
        {
            return URL::to('prospect/'.$id);
        }

        $prospect = Prospect::findOrfail($id);
        return view('prospect.show',compact('title','prospect'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - prospect';
        if($request->ajax())
        {
            return URL::to('prospect/'. $id . '/edit');
        }

        
        $leads = Lead::all()->pluck('isactive','id');

        
        $prospect = Prospect::findOrfail($id);
        return view('prospect.edit',compact('title','prospect' ,'leads' ) );
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
        $prospect = Prospect::findOrfail($id);
    	
        $prospect->title = $request->title;
        
        $prospect->isactive = $request->isactive;
        
        $prospect->nextactiondate = $request->nextactiondate;
        
        
        $prospect->lead_id = $request->lead_id;

        
        $prospect->save();

        return redirect('prospect');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/prospect/'. $id . '/delete');

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
     	$prospect = Prospect::findOrfail($id);
     	$prospect->delete();
        return URL::to('prospect');
    }
}
