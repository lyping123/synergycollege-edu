@extends('layout')

@section('content')
<div class="container" style="margin-top: 20px;">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4">Career Apply Form</h2>
        <form action="{{ route('career.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Employee Name --}}
            <div class="mb-3">
                <label for="e_name" class="form-label">Name</label>
                <input type="text" class="form-control @error('e_name') is-invalid @enderror" id="e_name" name="e_name" value="{{ old('e_name') }}" required>
                @error('e_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Employee IC --}}
            <div class="mb-3">
                <label for="e_ic" class="form-label">IC Number</label>
                <input type="text" class="form-control @error('e_ic') is-invalid @enderror" id="e_ic" name="e_ic" value="{{ old('e_ic') }}" required>
                @error('e_ic') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label for="e_gender" class="form-label">Gender</label>
                <select class="form-select @error('e_gender') is-invalid @enderror" id="e_gender" name="e_gender" required>
                    <option value="" disabled selected>Select gender</option>
                    <option value="Male" {{ old('e_gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('e_gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    {{-- <option value="Divorced" {{ old('e_mstatus') == 'Divorced' ? 'selected' : '' }}>Divorced</option> --}}
                </select>
                @error('e_gender') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Address --}}
            <div class="mb-3">
                <label for="e_address" class="form-label">Address</label>
                <textarea class="form-control @error('e_address') is-invalid @enderror" id="e_address" name="e_address" rows="3" required>{{ old('e_address') }}</textarea>
                @error('e_address') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Qualification --}}
            <div class="mb-3">
                <label for="e_quanlification" class="form-label">Qualification</label>
                <input type="text" class="form-control @error('e_quanlification') is-invalid @enderror" id="e_quanlification" name="e_quanlification" value="{{ old('e_quanlification') }}" required>
                @error('e_quanlification') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Marital Status --}}
            <div class="mb-3">
                <label for="e_mstatus" class="form-label">Marital Status</label>
                <select class="form-select @error('e_mstatus') is-invalid @enderror" id="e_mstatus" name="e_mstatus" required>
                    <option value="" disabled selected>Select Status</option>
                    <option value="Single" {{ old('e_mstatus') == 'Single' ? 'selected' : '' }}>Single</option>
                    <option value="Married" {{ old('e_mstatus') == 'Married' ? 'selected' : '' }}>Married</option>
                    {{-- <option value="Divorced" {{ old('e_mstatus') == 'Divorced' ? 'selected' : '' }}>Divorced</option> --}}
                </select>
                @error('e_mstatus') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Email --}}
            <div class="mb-3">
                <label for="e_email" class="form-label">Email</label>
                <input type="email" class="form-control @error('e_email') is-invalid @enderror" id="e_email" name="e_email" value="{{ old('e_email') }}" required>
                @error('e_email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Contact Number --}}
            <div class="mb-3">
                <label for="e_contact" class="form-label">Contact Number</label>
                <input type="text" class="form-control @error('e_contact') is-invalid @enderror" id="e_contact" name="e_contact" value="{{ old('e_contact') }}" required>
                @error('e_contact') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- Position --}}
            <div class="mb-3">
                <label for="e_position" class="form-label">Position</label>
                <input type="text" class="form-control @error('e_position') is-invalid @enderror" id="e_position" name="e_position" value="{{ old('e_position') }}" required>
                @error('e_position') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="e_course" class="form-label">Course</label>
                <select class="form-select @error('e_course') is-invalid @enderror" id="e_course" name="e_course" required>
                    <option value="" disabled selected>Select Status</option>
                    <option value="ACCOUNTING" {{ old('e_course') == 'ACCOUNTING' ? 'selected' : '' }}>ACCOUNTING</option>
                    <option value="COMPUTER NETWORKING" {{ old('e_course') == 'COMPUTER NETWORKING' ? 'selected' : '' }}>COMPUTER NETWORKING</option>
                    <option value="ELECTRONIC" {{ old('e_course') == 'ELECTRONIC' ? 'selected' : '' }}>ELECTRONIC </option>
                    <option value="GRAPHIC & MULTIMEDIA" {{ old('e_course') == 'GRAPHIC & MULTIMEDIA' ? 'selected' : '' }}>GRAPHIC & MULTIMEDIA</option>
                    <option value="PROGRAMMING & APPLICATION DEVELOPMENT" {{ old('e_course') == 'PROGRAMMING & APPLICATION DEVELOPMENT' ? 'selected' : '' }}>PROGRAMMING & APPLICATION DEVELOPMENT</option>
                </select>
                
                @error('e_course') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="e_attachment" class="form-label">Attachment (Academic Qualification/Resume/Certificate)</label>
                <input type="file" class="form-control @error('e_attachment') is-invalid @enderror" id="e_attachment" name="e_attachment" accept=".pdf,.docx,.jpg,.png">
                
            </div> --}}
            <div class="mb-3">
                
                <div class="form-group">
                <label class="text-center">*Attachment</label>
                <label for="input_name">e.g. Academic Qualification/Resume/Certificate</label>
                      <div class="mb-3">
                          <label class="form-label">PDF only:</label>
                          <input type="file" id="files_input" name="e_attachment[]" class="form-control" multiple required accept=".pdf">
                      </div>
                </div>
                <ul id="fileDetails" class="list-group mb-3"></ul>

                
             
                @error('e_attachment') <div class="invalid-feedback">{{ $message }}</div> @enderror
              </div>

            {{-- Submit Button --}}
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
        
    </div>
</div>
<script>
    document.getElementById('files_input').addEventListener('change', function () {
            const fileList = this.files;
            const fileDetails = document.getElementById('fileDetails');
            fileDetails.innerHTML = "";

            for (let i = 0; i < fileList.length; i++) {
                let file = fileList[i];
                let listItem = document.createElement('li');
                listItem.className = "list-group-item";
                listItem.textContent = `${file.name} (${(file.size / 1024).toFixed(2)} KB)`;
                fileDetails.appendChild(listItem);
            }
        });
</script>
@endsection
