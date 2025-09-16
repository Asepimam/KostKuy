<?php

namespace App\Http\Controllers;

use App\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(TransactionRepositoryInterface $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }

    public function checkBooking(){
        return view('pages.booking.checkBooking');
    }

    public function detailBooking(Request $request){
        $bookingid = $request->code;
        $email = $request->email;
        $phone = $request->phone;
        $booking = $this->transactionRepository->findBooking($bookingid, $email, $phone);
        return view('pages.booking.detailBooking', compact('booking'));
    }
}
