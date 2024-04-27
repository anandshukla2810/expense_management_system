<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\SchoolGroup;
use App\Models\Activity;
use App\Models\School;
use Illuminate\Support\Facades\Hash;

class APIController extends Controller
{
    public function states($country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return $states;
    }

    public function cities($state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return $cities;
    }
    public function school_groups($school_id)
    {
        $school_groups = SchoolGroup::where('school_id', $school_id)->get();
        return $school_groups;
    }

    public function activities_by_school($school_id)
    {
        $plan_type_id = School::where('id', $school_id)->value('plan_type_id');
        $activities = Activity::where('plan_type_id', $plan_type_id)->get();
        return $activities;
    }

    public function activity_instances_by_activity($activity_id)
    {
        $plan_type_id = ActivityInstance::where('id', $activity_id)->value('plan_type_id');
        $activities = Activity::where('plan_type_id', $plan_type_id)->get();
        return $activities;
    }

    public function check_email(Request $request)
    {
        // return $request;
        $count_email_existance = User::where('email', $request->email)->first();
        if($count_email_existance)
        {
            return 'false';
        }
        else
        {
            return 'true';
        }
    }
    
    public function check_email_existing_user(Request $request)
    {
        // return $request;
        $count_email_existance = User::where('email', $request->email)->where('id', '!=', $request->id)->first();
        if($count_email_existance)
        {
            return 'false';
        }
        else
        {
            return 'true';
        }
    }

    public function check_slug(Request $request)
    {
        // return $request;
        $count_slug_existance = Blog::where('slug', $request->slug)->first();
        if($count_slug_existance)
        {
            return 'false';
        }
        else
        {
            return 'true';
        }
    }
    
    public function check_slug_existing_user(Request $request)
    {
        // return $request;
        $count_slug_existance = Blog::where('slug', $request->slug)->where('id', '!=', $request->id)->first();
        if($count_slug_existance)
        {
            return 'false';
        }
        else
        {
            return 'true';
        }
    }
}