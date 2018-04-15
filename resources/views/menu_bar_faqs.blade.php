@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-center" style="padding-left:50px;">
                <h2>Perguntas Frequents</h2>
            </div>
        </div>
    </div>

<div class="container">

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        O que é a space2business?
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                      <p>A space2business apresenta-se como uma plataforma online de promoção e reserva de espaços de trabalho.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Quais os espaços de trabalho que podem ser partilhados?
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <p>Todos os espaços registados são avaliados pela equipa da space2business, de modo a disponibilizar na plataforma apenas os espaços com melhores qualidades e que cumprem os requisitos mínimos (Receção, Wi-fi e Mobília). </p>

                         <p>Espaços que podem ser partilhados:</p>
                        <ul>
                          <li>Coworking</li>
                          <li>Salas de formação</li>
                          <li>Salas de reunião grandes (> 10 pessoas)</li>
                          <li>Salas de reunião pequena (< 10 pessoas)</li>
                          <li>Escritórios</li>
                          <li>Auditórios</li>
                        </ul>                        
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Só as empresas podem partilhar espaços?</p>
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    <p>Sim.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading4">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Quais os passos necessários para partilhar um espaço?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                <div class="panel-body">
                    <p>“Registar” e “Partilhar”. Após guardados os dados de registo do espaço, a informação é validada pela equipa da space2business.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading5">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Quais os meios de pagamento disponíveis?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                <div class="panel-body">
                    <p>Existem 3 formas de pagamento disponíveis na plataforma da space2business:</p>
                     <ul>
                        <li>Visa</li>
                        <li>Mastercard</li>
                        <li>American Express</li>
                     </ul>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading6">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Quais as vantagens de reservar um espaço de trabalho pela space2business?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                <div class="panel-body">
                    <ul>
                       <li>Acesso aos melhores preços praticados no mercado, sendo ainda possível obter descontos na própria plataforma</li>
                       <li>Consulta de informação detalhada do espaço</li>
                       <li>Profunda agilização, simplicidade e rapidez no processo de reserva</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading7">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>O que é um coworking?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                <div class="panel-body">
                    <p>Um espaço de cowoking tem a particularidade de reunir diversos profissionais, que poderão ser das mais variadas áreas, distribuídos pelas secretárias de uma mesma sala.</p>
                     <p>Normalmente, um espaço de coworking contempla um conjunto de secretárias, um espaço de lazer e casa de banho.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading8">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse8" aria-expanded="false" aria-controls="collapse8">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Quais as vantagens de um coworking?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse8" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading8">
                <div class="panel-body">
                    <p>A utilização de um espaço de coworking tem várias vantagens, como a poupança na renda do espaço e nas contas de água, luz, gás, telefone e internet. Também potencia a capacidade de relacionamento profissional e, consequentemente, o aumento da rede de contactos.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading9">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse9" aria-expanded="false" aria-controls="collapse9">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Qual a diferença entre salas de reunião pequena e salas de reunião grande?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse9" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading9">
                <div class="panel-body">
                    <p>As salas de reunião pequenas têm uma ocupação máxima de 10 pessoas, ao passo que as salas de reunião grandes têm uma ocupação mínima de 11 pessoas.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading10">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse10" aria-expanded="false" aria-controls="collapse10">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Quando posso avaliar ou comentar acerca de um espaço?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse10" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading10">
                <div class="panel-body">
                    <p>Após iniciar o período da reserva, poderá partilhar a sua opinião relativamente ao espaço, através de uma avaliação e comentário(s).</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading11">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse11" aria-expanded="false" aria-controls="collapse11">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>É possível cancelar uma reserva?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse11" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading11">
                <div class="panel-body">
                    <p>Sim, após iniciar sessão, no menu principal, terá acesso às suas reservas. Depois de selecionar a reserva pretendida, poderá cancelá-la.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading12">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse12" aria-expanded="false" aria-controls="collapse12">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Como se processa o reembolso de uma reserva?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse12" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading12">
                <div class="panel-body">
                    <p>Processo regulado pelos “Termos & Condições” da plataforma da space2business.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading13">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse13" aria-expanded="false" aria-controls="collapse13">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>É necessário registar-me para efetuar uma reserva?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading13">
                <div class="panel-body">
                    <p>Sim, este processo permitirá aos elementos da equipa da space2business tratar cada cliente de forma individual e personalizada. Ao mesmo tempo, é uma garantia de segurança, quer para o cliente, quer para a space2business.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading14">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse14" aria-expanded="false" aria-controls="collapse14">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Como posso contactar a space2business?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse14" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading14">
                <div class="panel-body">
                    <p>Contactos oficiais disponíveis: formulário, email (info@space2business.com) ou telemóvel (+351 918 320 188).</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading15">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse15" aria-expanded="false" aria-controls="collapse15">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Como posso contactar o espaço que acabei de reservar?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse15" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading15">
                <div class="panel-body">
                    <p>Todos os detalhes relativos ao local arrendado estão expostos no próprio espaço.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading16">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse16" aria-expanded="false" aria-controls="collapse16">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Posso obter um recibo pelo pagamento do espaço?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse16" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading16">
                <div class="panel-body">
                    <p>Sim, será automaticamente enviado aquando do email confirmativo da reserva do espaço.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading17">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse17" aria-expanded="false" aria-controls="collapse17">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Preciso de cancelar ou alterar o meu aluguer, o que devo fazer?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse17" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading17">
                <div class="panel-body">
                    <p>Após ter concluído o processo de arrendamento, ficará disponível na plataforma uma opção que permite cancelar ou alterar o aluguer efectuado.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading18">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse18" aria-expanded="false" aria-controls="collapse18">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Esqueci-me da minha password de acesso, o que devo fazer?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse18" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading18">
                <div class="panel-body">
                    <p>Poderá recuperar a mesma, ou aterá-la, na própria plataforma.</p>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="heading19">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse19" aria-expanded="false" aria-controls="collapse19">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <p>Preciso trabalhar numa empresa para poder efetuar uma reserva?</p>
                    </a>
                </h4>
            </div>
            <div id="collapse19" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading19">
                <div class="panel-body">
                    <p>Não, qualquer pessoa pode reservar um espaço de trabalho.</p>
                </div>
            </div>
        </div>

    </div><!-- panel-group -->
    
    
</div><!-- container -->

<script type="text/javascript">
function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
@endsection

