          <table class="rtable">
            <thead>
              <tr>
                <th colspan ="27" align="center" style="background-color:blue; color:white">शिक्षकको विवरण</th>
                <th colspan ="25" align="center" style="background-color:#E6BB0D; color:#white">शैक्षिक विवरण</th>
                
              </tr>
              <tr>
                <th>क्र. सं.</th>
                <th>नाम थर (देवनागरि लिपि)</th>
                <th>नाम थर (English)</th>
                <th>जात</th>
                <th>धर्म</th>
                <th>लिंग</th>
                <th>मोबाइल नं</th>
                <th>आधिकारिक इमेल</th>
                <th>ठेगाना</th>
                <th>जन्मस्थान</th>
                <th>जन्ममिति (BS)</th>
                <th>जन्ममिति (AD) </th>
                <th>बैबाहिक स्थिति </th>
                <th>नागरिकता नं</th>
                <th>नागरिकता जारि मिति</th>
                <th>नागरिकता जारि जिल्ला</th>
                <th>बाजेको नाम</th>
                <th>बुवाको नाम</th>
                <th>आमाको नाम</th>
                <th>लाइसेन्सको तह</th>
                <th>लाइसेन्सको बिषय</th>
                <th>लाइसेन्स नं जारि मिति</th>
                <th>लाइसेन्स नं</th>
                <th>स्थाई लेखा नं</th>
                <th>पति / पत्नीको नाम</th>
                <th>कार्यरत विद्यालय</th>
                <th>शिक्षकको अवस्था </th>
                <!-- शैक्षिक विवरण  -->
                <th>एस एल सि पास गरेको विधालय</th>
                <th>एस एल सि उतिर्ण बर्ष</th>
                <th>एस एल सि प्रतिशत</th>
                <th>एस एल सि प्राप्तांक</th>
                <th>एस एल सि मेजर बिषय</th>

                <th>10+2 पास गरेको विधालय</th>
                <th>10+2 पास गरेको संकाय</th>
                <th>10+2 उतिर्ण बर्ष</th>
                <th>10+2 प्रतिशत</th>
                <th>10+2 प्राप्तांक</th>
                <th>10+2 मेजर बिषय</th>

                <th>BACHELOR'S पास गरेको युनिभर्सिटी</th>
                <th>BACHELOR'S पास गरेको विधालय</th>
                <th>BACHELOR'S पास गरेको संकाय</th>
                <th>BACHELOR'S उतिर्ण बर्ष</th>
                <th>BACHELOR'S प्रतिशत</th>
                <th>BACHELOR'S प्राप्तांक</th>
                <th>BACHELOR'S मेजर बिषय</th>
                
                <th>MASTER'S'S पास गरेको युनिभर्सिटी</th>
                <th>MASTER'S'S पास गरेको विधालय</th>
                <th>MASTER'S'S पास गरेको संकाय</th>
                <th>MASTER'S'S उतिर्ण बर्ष</th>
                <th>MASTER'S'S प्रतिशत</th>
                <th>MASTER'S'S प्राप्तांक</th>
                <th>MASTER'S'S मेजर बिषय</th>

              </tr>
            </thead>
            <tbody>
              @if (!empty($data))
              @php $i=1; @endphp
              @foreach($data as $key => $title)
              <tr>
                <td>{{ convertedNum($i++) }}</td>
                <td>{{ $title->teachers_name_nep}}</td>
                <td>{{ $title->teachers_name_eng }}</td>
                <td>{{ convertedNum($title->teachers_caste) }}</td>
                <td>{{ convertedNum($title->teachers_religion) }}</td>
                <td>@if ($title->teachers_gender == 1) पुरुष @elseif ($title->teachers_gender==2) महिला @else अन्य @endif</td>
                <td>{{ convertedNum($title->teachers_mobno)}}</td>
                <td>{{ convertedNum($title->teachers_email)}}</td>
                <td>{{ $title->teachers_localadd .'-' .convertedNum($title->teachers_ward)}}</td>
                <td>{{ convertedNum($title->teachers_birth_place)}}</td>
                <td>{{ convertedNum($title->teachers_dob_bs)}}</td>
                <td>{{ convertedNum($title->teachers_dob_ad)}}</td>
                <td>{{  $title->teacher_enroll_status == 1 ? 'विवाहित' : 'अविवाहित' }}</td>
                <td>{{ convertedNum($title->teachers_citno)}}</td>
                <td>{{ convertedNum($title->teachers_cit_jari_date)}}</td>
                <td>{{ convertedNum($title->teachers_cit_jari_district)}}</td>
                <td>{{ convertedNum($title->teachers_gf_name)}}</td>
                <td>{{ convertedNum($title->teachers_f_name)}}</td>
                <td>{{ convertedNum($title->teachers_m_name)}}</td>
                <td>{{ convertedNum($title->teachers_teacher_licensestep)}}</td>
                <td>{{ convertedNum($title->teachers_teacher_license_sub)}}</td>
                <td>{{ convertedNum($title->teachers_teacher_licenseno)}}</td>
                <td>{{ convertedNum($title->teachers_teacher_licenseno_jari_date)}}</td>
                <td>{{ convertedNum($title->teachers_panno)}}</td>
                <td>{{ convertedNum($title->teachers_hw_name)}}</td>
                <td>{{ convertedNum($title->school->school_name)}}</td>
                <td><p class="btn btn-{{  $title->teacher_enroll_status == 1 ? 'success' : 'danger' }} btn-rounded btn-fw btn-sm">{{  $title->teacher_enroll_status == 1 ? 'स्थाई' : 'अस्थाई' }}</p></td>
                @foreach($title->educationDetails as $ed)

                <td>{{$ed->slc_school_name}}</td>
                <td>{{$ed->slc_passed_year}}</td>
                <td>{{$ed->slc_percent}}</td>
                <td>{{$ed->slc_pass_marks}}</td>
                <td>{{$ed->slc_major_subject}}</td>

                <td>{{$ed->plustwo_school_name}}</td>
                <td>{{$ed->plustwo_faculty}}</td>
                <td>{{$ed->plustwo_passed_year}}</td>
                <td>{{$ed->plustwo_percentage}}</td>
                <td>{{$ed->plustwo_pass_marks}}</td>

                <td>{{$ed->bachelor_uuniversity_name}}</td>
                <td>{{$ed->bachelor_school_name}}</td>
                <td>{{$ed->bachelor_faculty }}</td>
                <td>{{$ed->bachelor_passed_year}}</td>
                <td>{{$ed->bachelor_percentage}}</td>
                <td>{{$ed->bachelor_pass_marks}}</td>
                <td>{{$ed->bachelor_major_subject}}</td>

                <td>{{$ed->masters_university_name}}</td>
                <td>{{$ed->masters_school_name}}</td>
                <td>{{$ed->masters_faculty }}</td>
                <td>{{$ed->masters_passed_year}}</td>
                <td>{{$ed->masters_percentage}}</td>
                <td>{{$ed->masters_pass_marks}}</td>
                <td>{{$ed->masters_major_subject}}</td>
                @endforeach
              </tr>
              @endforeach
              @endif
            </tbody>
          </table>