@extends('layout.master')

@section('content')
    @include('include.navadmin')
    <div class="row">
        <div class="col-3">@include('include.navQcmAdmin')</div>
        <div class="col-9">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                Upload Validation Error<br><br>
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>   
                    @endforeach
                    </ul>
                </div>
                @endif
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <form method="post" enctype="multipart/form-data" action="{{ url('/backoffice/qcm/import/import') }}">
                @csrf
                <div class="form-group">
                    <table class="table">
                        <tr>
                            <td width="40%" align="right"><label>Selectionner le fichier a Upload</label></td>
                            <td width="30">
                                <input type="file" name="select_file" />
                            </td>
                            <td width="30%" align="left">
                                <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                            </td>
                        </tr>
                        <tr>
                            <td width="40%" align="right"></td>
                            <td width="30"><span class="text-muted">.xls, .xslx</span></td>
                            <td width="30%" align="left"></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>
    </div>






@endsection