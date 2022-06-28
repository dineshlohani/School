<div class="mb-3">
  <a href="{{ route('teacherpd-ajax-prints', ['sid-'.$schoolID, 'stid-'.$statusID, 'n-'.$name, 'ln-'.$licenceNo])}}" class="btn btn-primary btn-sm mt-1"><i class="fa fa-print"> Print</i></a>
  <a href="{{ route('teacherpd-export', ['sid-'.$schoolID, 'stid-'.$statusID, 'n-'.$name, 'ln-'.$licenceNo])}}" class="btn btn-warning btn-sm mt-1"><i class="fa fa-file-excel-o" aria-hidden="true"> Excel</i></a>
</div>

<table class="rtable">
            <thead>
              <tr>
                <th>क्र. सं.</th>
                <th>नाम थर</th>
                <th>सम्पर्क नं. </th>
                <th>कार्यरत विधालय</th>
                <th>लाइसेन्स नं  </th>
                <th>स्थाई लेखा नं </th>
                <th>#</th> 
              </tr>
            </thead>
            <tbody>
              @if (!empty($data))
              @php $i=1; @endphp
              @foreach($data as $key => $title)
              
              <tr>
                <td>{{ convertedNum($i++) }}</td>
                <td>{{ $title->teachers_name_nep}}</td>
                <td>{{ $title->teachers_mobno}}</td>
                <td>{{ $title->school->school_name }}</td>
                <td>{{ convertedNum($title->teachers_teacher_licenseno) }}</td>
                <td>{{ convertedNum($title->teachers_panno) }}</td>
                
                <td>
                  <a class="btn btn-sm btn-info" href="{{ route('teachers-personal-detail-edit',$title->id)}}">
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a class="btn btn-sm btn-secondary" href="{{ route('teachers-profile-detail',$title->id)}}">
                    <i class="fa fa-eye"></i>
                  </a>
                </td>
                
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>
            @if(empty($title))
              <div class="alert alert-fill-danger" role="alert" style="margin-top: 15px;">
                    <i class="mdi mdi-alert-circle"></i>
                    Oh Sorry ! We couldnt find anything related your input data. Please check Filter and try again !!!.
              </div>
            @else
              <div class="alert alert-fill-success" role="alert" style="margin-top:15px;">
                  <i class="mdi mdi-alert-circle"></i>
                  Well done! You successfully found you looking at.
              </div>
            @endif
              
            