@extends('layouts.master')

@section('content')
 <h2> Contact with us in our office address </h2>
 
 <div class='container margin-top-20'>
    <div class="row">
        <div class="col-md-4">

        <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
    <Address>Address</Address:> 
  </a>
  <a href="#" class="list-group-item list-group-item-action"><h2>Top Deal Corporation</h2></a>
  <a href="#" class="list-group-item list-group-item-action"><h3> 1123 Fictional St,
San Francisco, CA 94103</h3></a>
  <a href="#" class="list-group-item list-group-item-action"><h2>P: (123) 456-7890
Full website
first.last@example.com</h2></a>
  <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
</div>

        </div>
        <div class="col-md-8">
           <div class="widget">

            <div class="row">

            <body>   
       
       

   
        <button onclick="getlocation();"> See office location</button>
        <div class="google-map">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7303.897606237003!2d90.3569255769253!3d23.749205031259635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755bf509a6fa479%3A0x8d2f8a74d60070ac!2sNiribili%20Housing!5e0!3m2!1sen!2sbd!4v1700349440480!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>   
    </body> 


            </div>
           </div>
        </div>
    </div>
 </div>     

 @endsection
