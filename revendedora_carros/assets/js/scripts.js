// Array de campos:
var camposTabela = ['id', 'marca', 'modelo', 'versao', 'descricao', 'tipo', 'categoria', 'segmento', 'ano_fabricacao', 'ano_modelo', 'portas', 'preco', 'dt_cadastro'];

//console.log("Numero de campos: " + camposTabela.length);


// Selecionando inputs checkbox:
var fieldID     = document.getElementById('campo-id');
var fieldMarca  = document.getElementById('campo-marca');
var fieldModelo = document.getElementById('campo-modelo');
var fieldVersao = document.getElementById('campo-versao');

var fieldDescricao = document.getElementById("campo-descricao");
var fieldTipo      = document.getElementById("campo-tipo");
var fieldCategoria = document.getElementById("campo-categoria");
var fieldSegmento  = document.getElementById("campo-segmento");

var fieldAnoFabricacao = document.getElementById("campo-ano_fabricacao");
var fieldAnoModelo     = document.getElementById("campo-ano_modelo");

var fieldNumPortas     = document.getElementById("campo-portas");
var fieldPreco         = document.getElementById("campo-preco");
var fieldDtCadastro    = document.getElementById("campo-dt_cadastro")

// Adicionando os listeners aos checkboxs:
fieldID.addEventListener('change', changeVisibility);
fieldMarca.addEventListener('change', changeVisibility);
fieldModelo.addEventListener('change',changeVisibility);
fieldVersao.addEventListener('change', changeVisibility);

fieldDescricao.addEventListener('change', changeVisibility);
fieldTipo.addEventListener('change',changeVisibility);
fieldCategoria.addEventListener('change', changeVisibility);
fieldSegmento.addEventListener('change', changeVisibility);

fieldAnoFabricacao.addEventListener('change', changeVisibility);
fieldAnoModelo.addEventListener('change', changeVisibility);

fieldNumPortas.addEventListener('change', changeVisibility);
fieldPreco.addEventListener('change', changeVisibility);
fieldDtCadastro.addEventListener('change', changeVisibility);


// Funções:
function changeVisibility(){
    
    let campo = this.id.split("-")[1];

    //console.log("Indice da coluna a ser manipulada: " + camposTabela.indexOf(campo));

    var idx = camposTabela.indexOf(campo);

    var listElements = document.querySelectorAll(`.col-${idx}`);

    if(this.checked){
        
        console.log(`Checkbox ${campo} esta marcado`);

        for(let itemLista of listElements){

            itemLista.style.display =  "inline-block";
        }

    }else{
        console.log(`Checkbox ${campo} não esta marcado`);

        for(let itemLista of listElements){

            itemLista.style.display = 'none';
        }
        
    }
}