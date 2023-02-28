<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DonationController extends Controller
{
    public function store(Request $request)
    {
        // Validate user input
        $request->validate([
            'amount' => 'required|numeric|max:1000000',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'comment' => 'nullable|max:255',
            'payment_title' => 'required|numeric|unique:donations'
        ]);

        // Sanitize user input
        $amount = htmlentities(strip_tags($request->input('amount')));
        $payment_title = htmlentities(strip_tags($request->input('payment_title')));
        $first_name = htmlentities(strip_tags($request->input('first_name')));
        $last_name = htmlentities(strip_tags($request->input('last_name')));
        $comment = htmlentities(strip_tags($request->input('comment')));
        $show_donation = $request->has('show_donation') ? 1 : 0;
        $show_name = $request->has('show_name') ? 1 : 0;
        $show_amount = $request->has('show_amount') ? 1 : 0;
        $show_comment = $request->has('show_comment') ? 1 : 0;

        // Create a new donation object
        $donation = new Donation;
        $donation->amount = $amount;
        $donation->payment_title = $payment_title;
        $donation->first_name = $first_name;
        $donation->last_name = $last_name;
        $donation->comment = $comment;
        $donation->public = $show_donation;
        $donation->amount_visibility = $show_amount;
        $donation->name_visibility = $show_name;
        $donation->comment_visibility = $show_comment;

        // Save the donation object to the database
        if ($donation->save()){
            return response()->json(['status' => 'successful']);
        }

        // Redirect the user with an error message
        return response()->json(['error' => 'Not Found'], 404);

    }

    public function changeStatus($id, Request $request)
    {
        $request->validate([
            'approved' => 'required|bool'
        ]);
        $donation = Donation::find($id);

        if (!$donation) {
            Log::error("Content with ID $id not found");
            return redirect()->back();
        }

        if ($request->input('approved')){
            $donation->status = 'approved';
        } else {
            $donation->status = 'rejected';
        }

        $donation->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $donation = Donation::find($id);

        if (!$donation) {
            Log::error("Donation with ID $id not found");
            return redirect()->back();
        }

        $donation->delete();

        return redirect()->back();
    }
}
