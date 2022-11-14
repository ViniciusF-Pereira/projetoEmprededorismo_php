"use strict";
const produto___WHEY__configuracoes = {
    sabores: "CHOCOLATE" || "MORANGO" || "BAUNILHA",
    gramas: "927g" || "1854g"
};
class Product {
    id;
    name;
    value;
    description;
    sabor;
    gramas;
    constructor(id, name, value, description, sabor, gramas) {
        this.id = id;
        this.name = name;
        this.value = value;
        this.description = description;
        this.sabor = sabor;
        this.gramas = gramas;
    }
}
const produto___whey__WOLFFIT = new Product(1, "WHEY PROTEIN WOLFFIT", 70.99, "Whey Protein é um suplemento proteico feito a partir da proteína extraída do soro do leite, composta principalmente por alfa-globulina e beta-globulina. O produto possui aminoácidos essenciais que são rapidamente absorvidos pelo corpo, substâncias que participam de forma ativa na construção de músculos e tecidos.", produto___WHEY__configuracoes.sabores, produto___WHEY__configuracoes.gramas);
const produto___creatina__WOLFFIT = new Product(2, "CREATINA WOLF FIT - 300G", 49.99, "A creatina é uma molécula encontrada naturalmente no tecido muscular, em quantidade limitada, que participa de todos os processos energéticos do corpo. Ela é fundamental na contração muscular, proporcionando maior força muscular, resistência física, redução no tempo de recuperação, e aumento do volume muscular.", "Natural", "300G");
const creatina__wolffit = {
    nome: document.getElementById("creatina__wolffit_h5"),
    descricao: document.getElementById("creatina__wolffit_p"),
    buton: document.getElementById("creatina__wolffit__buton"),
    tipo: produto___creatina__WOLFFIT
};
const whey__wolffit = {
    nome: document.getElementById("whey__wolffit_h5"),
    descricao: document.getElementById("whey__wolffit_p"),
    buton: document.getElementById("whey__wolffit__buton"),
    tipo: produto___whey__WOLFFIT,
};

function showProduct({ nome, descricao, tipo }) {
    nome.innerHTML = tipo.name;
    descricao.innerHTML = tipo.description;
}
showProduct(creatina__wolffit);
showProduct(whey__wolffit);
//------------------------------------------------------------------------------------------------
localStorage.setItem("nome_do_campo", "valor");

function apertouBotao({ valor, qtd, nome, descricao, buton, tipo }) {
    buton.addEventListener('click', () => {
        qtd = +1;
        console.log(tipo.name + ' preco ' + tipo.value);
        localStorage.setItem("produto" + tipo.id, tipo.name);
        localStorage.setItem("qtd" + tipo.id, String(qtd));
        valor = tipo.value * qtd;
        localStorage.setItem("valor" + tipo.id, String(tipo.value));
        alert("Produto adicionado ao carrinho!");
        history.go();
    });
}
var total = 0; // variável que retorna o total dos produtos que estão na LocalStorage.
var i = 0; // variável que irá percorrer as posições
var valor = 0; // variável que irá receber o preço do produto convertido em Float.
for (i = 1; i <= 99; i++) // verifica até 99 produtos registrados na localStorage
{
    var prod = localStorage.getItem("produto" + i + ""); // verifica se há recheio nesta posição. 
    if (prod != null) {
        const itens = document.getElementById("itens");
        // exibe os dados da lista dentro da div itens
        itens.innerHTML += localStorage.getItem("qtd" + i) + " x ";
        itens.innerHTML += localStorage.getItem("produto" + i);
        itens.innerHTML += " ";
        itens.innerHTML += "R$: " + localStorage.getItem("valor" + i) + "<hr>";
        // calcula o total dos recheios
        // valor convertido com o parseFloat()
        total = (total + valor); // arredonda para 2 casas decimais com o .toFixed(2)
    }
}
// exibe o total dos recheios
const total_ = document.getElementById("total");
total_.innerHTML = total.toFixed(2);