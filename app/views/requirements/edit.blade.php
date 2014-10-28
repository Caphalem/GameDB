@extends('layout.main')
@section('content')

<div class="page-header" style="text-align: center">
    <h1>
        <small>Edit Requirements</small>
    </h1>
    </p></div>

<form action="{{ action('RequirementsController@handleEdit') }}" method="post" role="form">
    <input type="hidden" name="id" value="{{ $requirement->id }}">

        <div class="form-group">
            <label for="os">OS</label>
            <input type="text" class="form-control" name="os" value="{{ $requirement->os }}">
        </div>
        <div class="form-group">
            <label for="cpu">CPU</label>
            <input type="text" class="form-control" name="cpu" value="{{ $requirement->cpu }}">
        </div>
        <div class="form-group">
            <label for="graphics_card">Graphics Card</label>
            <input type="text" class="form-control" name="graphics_card" value="{{ $requirement->graphics_card }}">
        </div>

        <div class="row">
            <div class="col-md-4">

                <label for="system_RAM">System RAM</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="system_RAM" value="{{ $requirement->system_RAM }}">

                    <div class="input-group-addon">GB</div>
                </div>
            </div>
            <div class="col-md-4">
                <label for="graphics_memory">Graphics Memory</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="graphics_memory"
                           value="{{ $requirement->graphics_memory }}">

                    <div class="input-group-addon">GB</div>
                </div>
            </div>

            <div class="col-md-4">
                <label for="hard_drive_space">Hard Drive Space</label>

                <div class="input-group">
                    <input type="text" class="form-control" name="hard_drive_space"
                           value="{{ $requirement->graphics_memory }}">

                    <div class="input-group-addon">GB</div>
                </div>
            </div>
        </div>
        <br>
        <input type="submit" value="Add" class="btn btn-primary"/>
        <a href="{{ action('RequirementsController@index') }}" class="btn btn-link">Cancel</a>
    </form>
    @stop