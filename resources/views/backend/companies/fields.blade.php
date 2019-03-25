<div class="row mt-4 mb-4">
    <div class="col">
         
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.companies.name1134341'))->class('col-md-2 form-control-label')->for('name1134341') }}
            <div class="col-md-10">
                
                        {{ html()->text('name1134341')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.backend.companies.name1134341'))
                        
                        
                      
                            ->required() 
                         }}
                

            </div><!--col-->
        </div><!--form-group-->
        
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.backend.companies.sms'))->class('col-md-2 form-control-label')->for('sms') }}
            <div class="col-md-10">
                
                        {{ html()->textarea('sms')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.backend.companies.sms'))
                        
                        
                      
                         }}
                

            </div><!--col-->
        </div><!--form-group-->
        

        <!--end-columns-->
             



    </div><!--col-->
</div><!--row-->