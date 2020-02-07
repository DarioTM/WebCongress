@extends('index')

@section('content')

<link href="{{url('assets/css/styledropzone.css')}}" rel="stylesheet"><!--problema-->

<div class="col-md-5">
    
    <div class="card mb-4">

    <div class="card-header ">{{ __('Realizar Pago') }}</div>
    <div class="card-body">
        
       <form method="POST" action="{{action('PagoCongresoController@store')}}"  class="mx-auto w-100 p-3 text-white " accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            
            
            <input type="text"  class="form-control col-md-12" name="iduser" value="{{ Auth::user()->id }}" style="visibility:hidden; height:0px!important">

            
            
            
          <div class="form-group row">
                
              <section class="cont-file">
                <div class="cont-file">
                  <div class="cont-file">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Upload File</label>
                          <div class="preview-zone hidden">
                            <div class="box box-solid">
                              <div class="box-header with-border">
                                <div><b>Vista Previa</b></div>
                                <div class="box-tools pull-right">
                                  <button type="button" class="btn btn-danger btn-xs remove-preview">
                                    <i class="fa fa-times"></i> Reset This Form
                                  </button>
                                </div>
                              </div>
                              <div class="box-body"></div>
                            </div>
                          </div>
                          <div class="dropzone-wrapper">
                            <div class="dropzone-desc">
                              <i class="glyphicon glyphicon-download-alt"></i>
                              <p>Elija un archivo de imagen o arrástrelo aquí.</p>
                            </div>
                            <input type="file" name="documento" class="dropzone">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
           
          </div> 


            <div class="form-group col-md-12">
              <input type="submit" value="Subir" class="btn btn-info mt-3">
              <a href="{{url('/')}}" class="btn btn-info mt-3">Volver</a>
            </div>
            
          
        </form>
    </div>   
</div>

  
                        
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js'></script>
    <script src="{{url('assets/js/img.js')}}"></script>
@endsection
