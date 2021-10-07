@include('include.header')
<div class="col-md-12" style="padding:20px">
    <p><h3>Lista de Clientes</h3></p>
    <a href="/createclient"><button type="button" class="btn btn-primary">Adicionar Cliente</button></a>
    <div class="col-12 table-responsive" style="padding-top:20px"> 
        <table class="table table-striped table-hover display" id="tbclients" name="tbclients">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Empresa</th>
                <th scope="col">Nome</th>
                <th scope="col">CPF / CNPJ</th>
                <th scope="col">RG</th>
                <th scope="col">Data de Nascimento</th>
                <th scope="col">Telefone</th>
                <th scope="col">E-mail</th>
                <th scope="col">CEP</th>
                <th scope="col">Endereço</th>
                <th scope="col">Nº</th>
                <th scope="col">Data de cadastro</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $cliente)
                <tr>
                    <th scope="row">{{ $cliente->id }}</th>
                    <th>{{ $cliente->razao_social }}</th>
                    <th>{{ $cliente->nome }}</th>                    
                    <td>{{ $cliente->cpf_cnpj }}</td>
                    <td>{{ $cliente->rg }}</td>
                    <td>{{ date('d/m/Y', strtotime($cliente->data_nascimento)); }}</script></td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->cep }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>{{ $cliente->numero }}</td>
                    <td>{{ date('d/m/Y H:m:s', strtotime($cliente->data_cadastro)); }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#tbclients').DataTable();
    } );
</script>

@include('include.footer')