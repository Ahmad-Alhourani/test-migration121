<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
                
                  <th>@sortablelink('name1134341', trans('labels.backend.companies.table.name1134341')) </th>
                
                 <th>{{ __('labels.backend.companies.table.sms') }}</th>
                
                  <th>@sortablelink('name', trans('labels.backend.companies.table.name')) </th>
                
                  <th>@sortablelink('email', trans('labels.backend.companies.table.email')) </th>
                
            <th>{{ __('labels.general.actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($companies as $company)
        <tr>
             
                <td>{{  $company->name1134341 }}</td>  
                <td>{{  $company->sms }}</td>  
                <td>{{  $company->name }}</td>  
                <td>{{  $company->email }}</td>  
                

               <td>{!! $company->action_buttons !!}</td>
        </tr>

        @endforeach
        </tbody>
    </table>
</div>