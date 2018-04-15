@extends('layouts.app')

@section('content')
<div ng-controller="ContactsController">
    <div id="contacts" perfect-parallax parallax-ratio="0.0" parallax-css="transform:translateY">
            
        <div perfect-parallax parallax-ratio="0.3" parallax-css="background-position-y" parallax-init-val="-100"             class="contact-page">
            
            <div class="contact-bg">

                <div class="row">
                    
                </div>
                
                <div class="row">
                    
                    <div class="col-sm-8 col-sm-offset-2">
                        
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-center" >
                                <h2 style="color:#fff!important;">Perguntas Frequents</h2>
                            </div>
                        </div>
                        
                        <div class="col-md-8">
                            
                            <p class="webbapp_contacts_text">space2business<br/>
                                Rua Pinto Bessa 522 r/ch<br/>                                
                                4300-428 Bonfim, Porto
                            </p>
                            <p>+351 917 663 035<br/>
                                <a href="mailto:info@space2business.com" target="_top">info@space2business.com</a>
                            </p>
                            
                            <form name="contactsForm" class="ct-form-wrapper cf"                                  ng-submit="contact(contactsForm.$valid)" novalidate>
                                <input class="input-normal" type="text" placeholder="nome" name="name">
                                <input class="input-normal" type="email" placeholder="email" name="email">
                                <textarea class="input-message" name="messages" name="messages" placeholder="A sua mensagem" equired="required" rows="5" cols="45">
                                </textarea>                              
                                <button type="submit">Enviar</button>
                            </form>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </div>
</div>
@endsection