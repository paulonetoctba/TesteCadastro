@include('include.header')
<div class="col-md-12" style="padding:20px">
    <p><h3>Lista de Empresas</h3></p>
    <a href="/createcompany"><button type="button" class="btn btn-primary">Adicionar Empresa</button></a>
    <div class="col-12 table-responsive" style="padding-top:20px">
        <table class="table table-striped table-hover display" id="tbcompanies" name="tbcompanies">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Razão Social</th>
                <th scope="col">Estado</th>
                <th scope="col">CNPJ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $empresa)
                <tr>
                    <th scope="row">{{ $empresa->razao_social }}</th>
                    <td>{{ $empresa->razao_social }}</td>
                    <td>{{ $empresa->uf }}</td>
                    <td>{{ $empresa->cnpj }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#tbcompanies').DataTable();
    } );
</script>
@include('include.footer')