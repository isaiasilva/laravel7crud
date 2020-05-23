@extends('eleitores.layout')
@section('content')
    <div class="col-lg-12" style="text-align: center">
        <div>
            <br>
            <h2>Pesquisa Eleitoral 2020 - Vereador: Pastor Birne</h2>
        </div>
        <br />
    </div>
    <div class="col-lg-12 margin-tb">
        <div class="pull-">
            <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-eleitor" data-toggle="modal">Novo Eleitor</a>
            <a href="javascript:void(0)" class="btn btn-success mb-2" id="new-pesquisa" data-toggle="modal">Responder Pesquisa</a> 
          
        </div>
    </div>

<br />
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p id="msg">{{ $message }}</p>
</div>
@endif


<body>
<link href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
<table id="minhaTabela" class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Localidade</th>
            <th>Endereço</th>
            <th width="280px">Ações</th>
        </tr>
    </thead>

    <tbody>
    @foreach ($eleitores as $eleitor)
    <tr id="eleitor_id_{{ $eleitor->id }}">
        <td>{{ $eleitor->id }}</td>
        <td>{{ $eleitor->nome }}</td>
        <td>{{ $eleitor->telefone }}</td>
        <td>{{ $eleitor->localidade }}</td>
        <td>{{ $eleitor->endereco }}</td>
        <td>
            <form action="{{ route('eleitores.destroy',$eleitor->id) }}" method="POST">
                <a class="btn btn-info" id="show-eleitor" data-toggle="modal" data-id="{{ $eleitor->id }}">Visualizar</a>
                <a href="javascript:void(0)" class="btn btn-success" id="edit-eleitor" data-toggle="modal"
                    data-id="{{ $eleitor->id }}">Editar </a>

                <meta name="csrf-token" content="{{csrf_token()}}">
                <a id="delete-eleitor" data-id="{{ $eleitor->id }}" class="btn btn-danger">Excluir</a>
                
        </td>
        </form>
        </td>
    </tr>
    @endforeach
</tbody>

</table>

<script>
    function Evento()
        <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    
</script>


<script>
$(document).ready(function(){
    $('#minhaTabela').DataTable({
          "language": {
              "lengthMenu": "Mostrando _MENU_ registros por página",
              "zeroRecords": "Nada encontrado",
              "info": "Mostrando página _PAGE_ de _PAGES_",
              "infoEmpty": "Nenhum registro disponível",
              "infoFiltered": "(filtrado de _MAX_ registros no total)"
          }
      });
});
</script>

{!! $eleitores->links() !!}
<div class="modal fade" id="crud-modalPesquisa" aria-hidden="true">
    <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title" id="eleitorCrudModal"></h4>
        </div>
        <div class="modal-body">
            <form>
            
                <h3> <p align="center"> Pastor Birne - CANDIDATO VEREADOR </center> </h3>
                <h3><br />1. Tendo em vista o seu gra&uacute; de conhecimento a respeito do "Pastor Birne" e de sua atua&ccedil;&atilde;o social em Lauro de Freitas, voc&ecirc; votaria no Pastor Birne, para vereador em 2020?</h3>
                <p><input type="checkbox" name="sim1" value="sim1" />SIM</p>
                <p><input type="checkbox" name="nao1" value="nao1" />N&Atilde;O</p>
                <p><input type="checkbox" name="talvez1" value="talvez1" />TALVEZ</p>
                <p></p>
                <h3>2. Sabendo que uma das atribui&ccedil;&otilde;es de um vereador &eacute;:&nbsp;<br /><span>* Fiscalizar as contas da prefeitura, de forma a inibir a exist&ecirc;ncia de obras superfaturadas e/ou atrasadas, bem como * Fiscalizar e controlar diretamente a boa e correta gest&atilde;o do dinheiro p&uacute;blico por parte do Poder Executivo (Prefeitura)&nbsp;<br /></span><span>Voc&ecirc; acredita que o&nbsp;</span>Pastor Birne, possui responsabilidade, conhecimento&nbsp; t&eacute;cnico, acad&ecirc;mico e as qualidades necess&aacute;rias para cumprir esta tarefa se eleito?&nbsp;</h3>
                <p><input type="checkbox" name="sim2" value="sim2" />SIM</p>
                <p><input type="checkbox" name="nao2" value="nao2" />N&Atilde;O</p>
                <p><input type="checkbox" name="talvez2" value="talvez2" />TALVEZ</p>
                <p></p>
                <h3>3. Uma das responsabilidades de um vereador &eacute; a elabora&ccedil;&atilde;o de projetos de lei. O candidato a vereador "Pastor Birne", se eleito compromete-se a continuar o seu trabalho social e expandi-lo, bem como posicionar-se contra nos projetos de lei em temas sobre:&nbsp;<span>aborto, drogas, doutrina&ccedil;&atilde;o sexual infantil, dentre outros e defender os valores crist&atilde;os e da fam&iacute;lia. Atrav&eacute;s do seu voto no "Pastor Birne",&nbsp; voc&ecirc; se sentir&aacute; seguro e representado na defesa destas bandeiras na c&acirc;mera de vereadores de Lauro de Freitas de 2021?</span></h3>
                <p><input type="checkbox" name="sim3" value="sim3" />SIM</p>
                <p><input type="checkbox" name="nao3" value="nao3" />N&Atilde;O</p>
                <p><input type="checkbox" name="talvez3" value="talvez3" />TALVEZ</p>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                         <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <a href="{{ route('eleitores.index') }}" class="btn btn-danger">RESPONDER</a>
                        </div>
                </div>

            </form>
            
        </div>
    </div>
</div>  

<!-- Add and Edit eleitor modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="eleitorCrudModal"></h4>
            </div>
            <div class="modal-body">
                <form name="custForm" action="{{ route('eleitores.store') }}" method="POST">
                    <input type="hidden" name="cust_id" id="cust_id">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nome:</strong>
                                <input type="text" name="nome" id="nome" class="form-control" placeholder="Nome"
                                    onchange="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Telefone (WhatsApp):</strong>
                                <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Informe no formato: 99999-9999" required>
                               
                            </div>
                        </div>
                       
                         <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Localidade:</strong>
                                <input type="text" name="localidade" id="localidade" class="form-control"
                                    placeholder="Localidade" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Endereço:</strong>
                                <input type="text" name="endereco" id="endereco" class="form-control"
                                    placeholder="Endereço" onchange="validate()" onkeypress="validate()">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary"
                                disabled>Enviar</button>
                            <a href="{{ route('eleitores.index') }}" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Show eleitor modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="eleitorCrudModal-show"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2"></div>
                    <div class="col-xs-10 col-sm-10 col-md-10 ">
                        @if(isset($eleitor->nome))

                        <table>
                            <tr>
                                <td><strong>Nome:</strong></td>
                                <td>{{$eleitor->nome}}</td>
                            </tr>
                            <tr>
                                <td><strong>Telefone:</strong></td>
                                <td>{{$eleitor->telefone}}</td>
                            </tr>
                            <tr>
                                <td><strong>Localidade:</strong></td>
                                <td>{{$eleitor->localidade}}</td>
                            </tr>
                            <tr>
                                <td><strong>Endereço:</strong></td>
                                <td>{{$eleitor->endereco}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: right "><a href="{{ route('eleitores.index') }}"
                                        class="btn btn-danger">OK</a> </td>
                            </tr>
                        </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    error = false

    function validate() {
        if (document.custForm.nome.value != '' && document.custForm.telefone.value != '' && document.custForm.localidade  != '' && document.custForm.endereco
            .value != '')
            document.custForm.btnsave.disabled = false
        else
            document.custForm.btnsave.disabled = true
    }
</script>