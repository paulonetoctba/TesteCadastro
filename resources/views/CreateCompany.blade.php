@include('include.header')
    <div class="col-md-12" style="padding:20px">
        <p><h3>Cadastrar Empresa</h3></p>
        <form action="{{route('cadastrarempresa')}}" method="POST" accept-charset="UTF-8">
        @csrf
            <div class="mb-3">                
                <label for="razao_social" class="form-label">Razão Social</label>
                <input type="text" id="razao_social" name="razao_social" placeholder="Preencha a Razão Social" maxlength="200" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="uf" class="form-label">Estado</label>             
                <select id="uf" name="uf" class="form-select" aria-label="Default select example" required>
                    <option value="">Selecione o Estado...</option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espírito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraíba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantins</option>
                </select>
            </div>
            <div class="mb-3">    
                <label for="cnpj" class="form-label">CNPJ</label>
                <input type="text" id="cnpj" name="cnpj" placeholder="Preencha o CNPJ" maxlength="18" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function(){
            $(cnpj).mask("00.000.000/0000-00");
        });
    </script>
    @include('include.footer')