@include('include.header')
    <div class="col-md-12" style="padding:20px">
        <p><h3>Cadastrar Cliente</h3></p>
        <form action="{{route('cadastrarcliente')}}" method="POST" accept-charset="UTF-8">
        @csrf
            <div class="mb-3">
                <label for="id_empresa" class="form-label">Selecione a Empresa</label>
                <select id="id_empresa" name="id_empresa" class="form-control" required>
                    <option value="">Selecione a Empresa...</option>
                    @foreach ($companies as $company)
                    <option value="{{ $company->id }}" data-foo="{{ $company->uf }}">{{ $company->razao_social }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" id="nome" name="nome" placeholder="Preencha o Nome" maxlength="255"class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Tipo de Documento</label>
                <select id="documento" name="documento" onchange="exibe_campos()" class="form-select" aria-label="Default select example" required>
                    <option value="">Escolha o tipo de Cadastro</option>
                    <option value="1">Pessoa Física</option>
                    <option value="2">Pessoa Jurídica</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Número do Documento</label>
                <input type="text" id="cpf_cnpj" name="cpf_cnpj" placeholder="Preencha o número..." maxlength="18" class="form-control" required>
            </div>
            <div class="mb-3">    
                <label for="rg" class="form-label" id="lbrg">RG</label>
                <input type="text" id="rg" name="rg" placeholder="Preencha o RG" maxlength="9" class="form-control">
            </div>
            <div class="mb-3">
                <label for="data_nascimento" class="form-label" id="lbdata_nascimento">Data de Nacimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" onblur="valida_idade(data_nascimento.value)" class="form-control">
            </div>
            <div class="mb-3">
                <label for="tel" class="form-label">Telefone</label>
                <input type="tel" id="telefone" name="telefone" placeholder="Preencha o Telefone" maxlength="255" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Preencha o E-mail" maxlength="150" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" id="cep" name="cep" placeholder="Preencha o CEP" maxlength="8" onblur="pesquisacep(cep.value)" class="form-control" data-mask="00000-000" required>
            </div>
            <div class="mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" id="endereco" name="endereco" placeholder="Preencha o Endereço" maxlength="255" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="number" id="numero" name="numero" placeholder="Preencha o Nº" min="1" max="99999" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Enviar</button>
        </form>
    </div>

    <script>
        $(document).ready(function(){
            $(cep).mask("00000-000");
            $(telefone).mask("(00)00000-0000");
        });

        function pesquisacep(valor) {
            var cep = valor.replace(/\D/g, '');

            if (cep != "") {

                var validacep = /^[0-9]{8}$/;

                if (validacep.test(cep)) {

                    document.getElementById('endereco').value = "...";

                    var script = document.createElement('script');

                    script.src = '//viacep.com.br/ws/' + cep + '/json/?callback=callback_partida';

                    document.body.appendChild(script);

                } else {
                    limpar_endereco();
                    alert("Formato de CEP inválido.");
                }
            } else {
                limpar_endereco();
            }
        };

        function callback_partida(conteudo) {
            if (!("erro" in conteudo)) {
                document.getElementById('endereco').value = (conteudo.logradouro + ' - ' + conteudo.bairro + ' - ' + conteudo.localidade + ' - ' + conteudo.uf);
                document.getElementById('numero').focus();
            } else {
                limpar_endereco();
                alert("CEP não encontrado.");
            }
        }

        function limpar_endereco()
        {
            document.getElementById('endereco').value = '';
        }

        function valida_idade(idade)
        {
            var e = document.getElementById("id_empresa");
            var UF =  e.options[e.selectedIndex].getAttribute('data-foo');
            var idade = document.getElementById('data_nascimento').value;
            var partesIdade = idade.split("-");
            if(UF="PR")
            {
                var currentDate = new Date();
                if((currentDate.getFullYear() - partesIdade[0]) <= 18)
                {
                    alert('Não é possível menores de idade realizarem o cadastro nas empresas Paranaenses!');
                }
            }
        }

        function exibe_campos()
        {
            if(document.getElementById("documento").value==1)
            {
                document.getElementById("lbrg").style.display = "block";
                document.getElementById("rg").style.display = "block";
                document.getElementById("lbdata_nascimento").display = "block";
                document.getElementById("data_nascimento").display = "block";
                
            }else{
                document.getElementById("lbrg").style.display = "none";
                document.getElementById("rg").style.display = "none";
                document.getElementById("lbdata_nascimento").style.display = "none";
                document.getElementById("data_nascimento").style.display = "none";
            }
        }
    </script>
@include('include.footer')