<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lead;
use Amranidev\Ajaxis\Ajaxis;
use URL;

/**
 * Class LeadController.
 *
 * @author  The scaffold-interface created at 2017-03-19 11:24:46am
 * @link  https://github.com/amranidev/scaffold-interface
 */
class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Index - lead';
        $leads = Lead::paginate(6);
        return view('lead.index',compact('leads','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create - lead';
        
        return view('lead.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param    \Illuminate\Http\Request  $request
     * @return  \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lead = new Lead();

        
        $lead->title = $request->title;

        
        $lead->isactive = $request->isactive;

        
        $lead->nextactiondate = $request->nextactiondate;

        
        
        $lead->save();

        $pusher = App::make('pusher');

        //default pusher notification.
        //by default channel=test-channel,event=test-event
        //Here is a pusher notification example when you create a new resource in storage.
        //you can modify anything you want or use it wherever.
        $pusher->trigger('test-channel',
                         'test-event',
                        ['message' => 'A new lead has been created !!']);

        return redirect('lead');
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
        $title = 'Show - lead';

        if($request->ajax())
        {
            return URL::to('lead/'.$id);
        }

        $lead = Lead::findOrfail($id);
        return view('lead.show',compact('title','lead'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param    \Illuminate\Http\Request  $request
     * @param    int  $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id,Request $request)
    {
        $title = 'Edit - lead';
        if($request->ajax())
        {
            return URL::to('lead/'. $id . '/edit');
        }

        
        $lead = Lead::findOrfail($id);
        return view('lead.edit',compact('title','lead'  ));
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
        $lead = Lead::findOrfail($id);
    	
        $lead->title = $request->title;
        
        $lead->isactive = $request->isactive;
        
        $lead->nextactiondate = $request->nextactiondate;
        
        
        $lead->save();

        return redirect('lead');
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
        $msg = Ajaxis::BtDeleting('Warning!!','Would you like to remove This?','/lead/'. $id . '/delete');

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
     	$lead = Lead::findOrfail($id);
     	$lead->delete();
        return URL::to('lead');
    }
}
