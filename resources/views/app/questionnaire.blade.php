@can('isAdmin')
@extends('layouts.template')

@section('includes')  


<link href="{{asset('css/questionnaire.css')}}" rel="stylesheet">

@endsection

@section('content')

<div class="wrapper">
  <div class="formContent">
    <!-- Tabs Titles -->




    <form method="POST" action="{{route('app.make.question')}}">
        @csrf

        <div class="question_block">
            <input type="text" name="question" placeholder="Write question"> <span class="answer_block"><label for="cars">Answer type</label>
                                                    <select name="answer_type" id="answer">
                                                        <option value="percentage">Percentage %</option>
                                                        <option value="number">Number</option>
                                                        <option value="yesno_m">Yes/No/Maybe</option>
                                                    </select></span>
        </div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div style="color:red; margin-top:10px;"> {{$error}} </div>
            @endforeach
        @elseif(Session::get('success'))
                <div>
                    <p style="color:green; margin-top:10px;">{{ Session::get('success') }}</p>
                    <a href="{{route('app.dashboard')}}" style="color:green;">Go To Dasheboard</a>
                </div> 
        @endif
        <div class=""><button type="submit">Save</button></div>


    </form>



  </div>

  <script>


  </script>
</div>







@endsection

@endcan