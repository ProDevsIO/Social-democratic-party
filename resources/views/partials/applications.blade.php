                        <div class="table-responsive">
                            @if(count($applications) > 0)
                                <table class="table table-centered table-striped dt-responsive nowrap w-100"
                                    id="data_table">
                                    <thead>
                                        <tr>

                                            <th> Name</th>
                                            
                                            <th>Form</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Fee</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach($applications as $application)
                                            <tr>
                                                <td class="table-user">
                                                    {{$application->first_name}}   {{$application->last_name}}
                                                </td>
                                                
                                                <td>
                                                    {{$application->form ? $application->form->name : null}}
                                                </td>
                                                <td>
                                                    {{$application->category ? $application->category->name : null}}
                                                </td>
                                                <td >
                                                    {{$application->position ? $application->position->name : null}}
                                                </td>
                                                <td>
                                                    {{$application->payment ? number_format($application->payment->amount_paid) : null}}
                                                </td>
                                                <td >
                                                    @if($application->status == 1)
                                                        <span class="badge bg-soft-success text-success">Paid</span>
                                                    @else
                                                       <span class="badge bg-soft-warning text-warning">Unpaid</span>
                                                    @endif
                                                </td>
                                                <td>
                                                {{ date('M d, Y H:i A', strtotime($application->created_at)) }}
                                                </td>
                                                <td>
                                                <div class="dropdown">
                                                            <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Action <i class="mdi mdi-chevron-down"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="{{ url('/admin/application/single/'.$application->id) }}">View More</a>
                                                                
                                                            </div>
                                                 </div>
                                                </td>
                                            </tr>
                                            @endforeach 
                                    </tbody>
                                </table>
                            @else
                                        <h4 class="text-center">No applications created yet</h4>
                            @endif
                        </div>