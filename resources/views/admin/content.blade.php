<div class="row center">
                            <div class="col m12 s8">
                        <div class="card">
                            <div class="card-panel">
                                    <h4 class="uppercase text-center">
                                            Reported Faults
                                    </h4>
                            </div>
                            <div class="card-content">

                            <div class="card-content">
                                <table class=" responsive-table">
                                    <thead>
                                        <tr>
                                            <th>Fault Name</th>
                                            <th>Category</th>
                                            <th>Location</th>
                                            <th>User Email</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Reported date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                  @foreach($issues as $issue)
                                      <tr>
                                          <td>{{$issue->fault_name}}</td>
                                          <td>{{$issue->category}}</td>
                                          <td>{{$issue->location}}</td>
                                          <td>{{$issue->email}}</td>
                                          <td>{{$issue->username}}</td>
                                          <td>{{$issue->description}}</td>
                                          <td>{{$issue->created_at}}</td>
										 <td><button onclick="fixFault({{$issue->id}});">btn</button></td>
   						
                                      </tr>
                                  @endforeach
                                    
                                    </tbody>
                                
                                </table>
                        