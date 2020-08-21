
@extends('layouts.app')

@section('content')
<div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit salary Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('salary.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salary.update',$salary->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>name:</strong>
                    <select name="employee_id" class="form-control">
                                            <option value="{{$salary->name }}" 
                                                disabled selected>Select Employee</option>
                                            @foreach($employees as $employee)
                                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                    </select>
                </div>        
                <div class="form-group">
                    <strong>salary_month:</strong>
                    <select name="salary_month" class="form-control">
                                                    <option value="" selected disabled>Select a month</option>
                                                    <option value="january">January</option>
                                                    <option value="february">February</option>
                                                    <option value="march">March</option>
                                                    <option value="april">April</option>
                                                    <option value="may">May</option>
                                                    <option value="june">June</option>
                                                    <option value="july">July</option>
                                                    <option value="august">August</option>
                                                    <option value="september">September</option>
                                                    <option value="october">October</option>
                                                    <option value="november">November</option>
                                                    <option value="december">December</option>
                     </select>
                </div> 
                <div class="form-group">
                    <strong>salary_year:</strong>
                    <input type="text" name="salary_year" value="{{ $salary->salary_year }}" class="form-control" placeholder="salary_year">
                </div> 
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>paid_amount</strong>
                        <input type="text" name="paid_amount" value="{{ $salary->paid_amount }}"  class="form-control" placeholder="paid_amount" required>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </div>
        </div>
        </div>
    </form>

</div>
</div>
</div>

@endsection
