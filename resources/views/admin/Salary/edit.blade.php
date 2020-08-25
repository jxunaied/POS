
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
                    <strong>ParentId:</strong>
                    <input type="text" name="parentid" value="{{ $salary->parentid }}" class="form-control" placeholder="ParentId">
                </div>        
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                            <label>Month</label>
                            <select name="salary_month" class="form-control">
                                <option value="" selected disabled>please select</option>
                                <option value="january" @if ( $salary->salary_month == "january") {{ 'selected' }} @endif>January</option>
                                <option value="february" @if ( $salary->salary_month == "february") {{ 'selected' }} @endif>February</option>
                                <option value="march" @if ( $salary->salary_month == "march") {{ 'selected' }} @endif>March</option>
                                <option value="april" @if ( $salary->salary_month == "april") {{ 'selected' }} @endif>April</option>
                                <option value="may" @if ( $salary->salary_month == "may") {{ 'selected' }} @endif>May</option>
                                <option value="june" @if ( $salary->salary_month == "june") {{ 'selected' }} @endif>June</option>
                                <option value="july" @if ( $salary->salary_month == "july") {{ 'selected' }} @endif>July</option>
                                <option value="august" @if ( $salary->salary_month == "august") {{ 'selected' }} @endif>August</option>
                                <option value="september" @if ( $salary->salary_month == "september") {{ 'selected' }} @endif>September</option>
                                <option value="october" @if ( $salary->salary_month == "october") {{ 'selected' }} @endif>October</option>
                                <option value="november" @if ( $salary->salary_month == "november") {{ 'selected' }} @endif>November</option>
                                <option value="december" @if ( $salary->salary_month == "december") {{ 'selected' }} @endif>December</option>
                            </select>

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
