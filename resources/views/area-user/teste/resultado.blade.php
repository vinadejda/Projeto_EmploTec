@extends('area-user.layout.template')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Teste Realizados
            </div>
            <div class="panel-body">
               
                    
                   
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                           Você acertou {{ $resposta }}/5 
                        </div>
                    </div>
                                        
                 
                
            </div>
        </div>
    </div>
</div>

@endsection