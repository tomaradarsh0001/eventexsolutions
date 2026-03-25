{{-- resources/views/admin/gallery/create.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($event) ? 'Edit Event' : 'Create New Event' }} - Gallery</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #fff5f5 0%, #ffffff 100%);
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 24px;
        }
        
        .form-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }
        
        .form-header {
            background: linear-gradient(135deg, #ec489a, #f43f5e);
            padding: 30px;
            color: white;
        }
        
        .form-header h1 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .form-header p {
            opacity: 0.9;
            font-size: 14px;
        }
        
        .form-body {
            padding: 30px;
        }
        
        .form-group {
            margin-bottom: 24px;
        }
        
        .form-group label {
            display: block;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ec489a;
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        /* File Upload Area */
        .file-upload-area {
            border: 2px dashed #e2e8f0;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8fafc;
        }
        
        .file-upload-area:hover {
            border-color: #ec489a;
            background: #fef3f3;
        }
        
        .file-upload-area .material-icons {
            font-size: 48px;
            color: #ec489a;
            margin-bottom: 12px;
        }
        
        .file-upload-area p {
            color: #64748b;
            font-size: 14px;
        }
        
        .file-upload-area input {
            display: none;
        }
        
        /* Preview Grid */
        .preview-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
            gap: 12px;
            margin-top: 16px;
        }
        
        .preview-item {
            position: relative;
            border-radius: 12px;
            overflow: hidden;
            aspect-ratio: 1;
            background: #f1f5f9;
        }
        
        .preview-item img,
        .preview-item video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .preview-item .remove-btn {
            position: absolute;
            top: 4px;
            right: 4px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            width: 24px;
            height: 24px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .preview-item .remove-btn:hover {
            background: #ec489a;
            transform: scale(1.1);
        }
        
        /* Existing Media */
        .existing-media {
            margin-top: 24px;
            padding-top: 24px;
            border-top: 1px solid #e2e8f0;
        }
        
        .existing-media h3 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 16px;
            color: #1e293b;
        }
        
        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid #e2e8f0;
        }
        
        .btn-cancel {
            padding: 12px 24px;
            border-radius: 12px;
            border: 2px solid #e2e8f0;
            background: white;
            color: #64748b;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-cancel:hover {
            border-color: #ec489a;
            color: #ec489a;
        }
        
        .btn-submit {
            padding: 12px 32px;
            border-radius: 12px;
            border: none;
            background: linear-gradient(135deg, #ec489a, #f43f5e);
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(236, 72, 153, 0.3);
        }
        
        /* Alert Messages */
        .alert {
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 20px;
        }
        
        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
        
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }
            
            .form-header {
                padding: 20px;
            }
            
            .form-body {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-card">
            <div class="form-header">
                <h1>{{ isset($event) ? 'Edit Event' : 'Create New Event' }}</h1>
                <p>{{ isset($event) ? 'Update your gallery event details' : 'Add a new event to your gallery' }}</p>
            </div>
            
            <div class="form-body">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-error">
                        <ul style="margin-left: 20px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form action="{{ isset($event) ? route('admin.gallery.update', $event->id) : route('admin.gallery.store') }}" 
                      method="POST" 
                      enctype="multipart/form-data"
                      id="galleryForm">
                    @csrf
                    @if(isset($event))
                        @method('PUT')
                    @endif
                    
                    <div class="form-group">
                        <label for="name">Event Name *</label>
                        <input type="text" 
                               id="name" 
                               name="name" 
                               value="{{ old('name', isset($event) ? $event->name : '') }}" 
                               required>
                    </div>
                    
                    <div class="form-group">
                        <label for="event_date">Event Date</label>
                        <input type="date" 
                               id="event_date" 
                               name="event_date" 
                               value="{{ old('event_date', isset($event) && $event->event_date ? $event->event_date : '') }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" 
                                  name="description" 
                                  placeholder="Describe this event...">{{ old('description', isset($event) ? $event->description : '') }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Photos (JPEG, PNG, GIF - Max 10MB each)</label>
                        <div class="file-upload-area" onclick="document.getElementById('photos').click()">
                            <span class="material-icons">cloud_upload</span>
                            <p>Click to upload photos</p>
                            <p style="font-size: 12px; margin-top: 5px;">You can select multiple files</p>
                            <input type="file" 
                                   id="photos" 
                                   name="photos[]" 
                                   accept="image/*" 
                                   multiple 
                                   style="display: none;"
                                   onchange="previewFiles(this, 'photosPreview')">
                        </div>
                        <div id="photosPreview" class="preview-grid"></div>
                    </div>
                    
                    <div class="form-group">
                        <label>Videos (MP4, MOV, AVI, WEBM - Max 50MB each)</label>
                        <div class="file-upload-area" onclick="document.getElementById('videos').click()">
                            <span class="material-icons">video_library</span>
                            <p>Click to upload videos</p>
                            <p style="font-size: 12px; margin-top: 5px;">You can select multiple files</p>
                            <input type="file" 
                                   id="videos" 
                                   name="videos[]" 
                                   accept="video/*" 
                                   multiple 
                                   style="display: none;"
                                   onchange="previewFiles(this, 'videosPreview')">
                        </div>
                        <div id="videosPreview" class="preview-grid"></div>
                    </div>
                    
                    @if(isset($event) && ($event->images->count() > 0 || $event->videos->count() > 0))
                        <div class="existing-media">
                            <h3>Existing Media</h3>
                            
                            @if($event->images->count() > 0)
                                <div style="margin-bottom: 20px;">
                                    <h4 style="font-size: 14px; margin-bottom: 12px; color: #ec489a;">Photos ({{ $event->images->count() }})</h4>
                                    <div class="preview-grid">
                                        @foreach($event->images as $image)
                                            <div class="preview-item" data-id="{{ $image->id }}" data-type="photo">
                                                <img src="{{ Storage::url($image->path) }}" alt="Photo">
                                                <button type="button" class="remove-btn" onclick="markForRemoval(this, 'photos')">
                                                    <span class="material-icons" style="font-size: 14px;">close</span>
                                                </button>
                                                <input type="hidden" name="remove_photos[]" value="{{ $image->id }}" class="remove-photo-{{ $image->id }}" disabled>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            
                            @if($event->videos->count() > 0)
                                <div>
                                    <h4 style="font-size: 14px; margin-bottom: 12px; color: #ec489a;">Videos ({{ $event->videos->count() }})</h4>
                                    <div class="preview-grid">
                                        @foreach($event->videos as $video)
                                            <div class="preview-item" data-id="{{ $video->id }}" data-type="video">
                                                <video>
                                                    <source src="{{ Storage::url($video->path) }}" type="video/mp4">
                                                </video>
                                                <button type="button" class="remove-btn" onclick="markForRemoval(this, 'videos')">
                                                    <span class="material-icons" style="font-size: 14px;">close</span>
                                                </button>
                                                <input type="hidden" name="remove_videos[]" value="{{ $video->id }}" class="remove-video-{{ $video->id }}" disabled>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            
                            <p style="font-size: 12px; color: #64748b; margin-top: 12px;">
                                <span class="material-icons" style="font-size: 12px; vertical-align: middle;">info</span>
                                Click on the X to remove existing media
                            </p>
                        </div>
                    @endif
                    
                    <div class="form-actions">
                        <a href="{{ route('admin.gallery.index') }}" class="btn-cancel">
                            <span class="material-icons">close</span>
                            Cancel
                        </a>
                        <button type="submit" class="btn-submit">
                            <span class="material-icons">{{ isset($event) ? 'update' : 'add' }}</span>
                            {{ isset($event) ? 'Update Event' : 'Create Event' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        // Preview files before upload
        function previewFiles(input, previewId) {
            const preview = document.getElementById(previewId);
            preview.innerHTML = '';
            
            if (input.files) {
                Array.from(input.files).forEach((file, index) => {
                    const reader = new FileReader();
                    const previewItem = document.createElement('div');
                    previewItem.className = 'preview-item';
                    
                    reader.onload = function(e) {
                        if (file.type.startsWith('image/')) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            previewItem.appendChild(img);
                        } else if (file.type.startsWith('video/')) {
                            const video = document.createElement('video');
                            video.src = e.target.result;
                            video.preload = 'metadata';
                            previewItem.appendChild(video);
                        }
                        
                        const removeBtn = document.createElement('button');
                        removeBtn.type = 'button';
                        removeBtn.className = 'remove-btn';
                        removeBtn.innerHTML = '<span class="material-icons" style="font-size: 14px;">close</span>';
                        removeBtn.onclick = function() {
                            previewItem.remove();
                            // Note: You can't easily remove files from input, but you can track them
                        };
                        previewItem.appendChild(removeBtn);
                    };
                    
                    reader.readAsDataURL(file);
                    preview.appendChild(previewItem);
                });
            }
        }
        
        // Mark existing media for removal
        function markForRemoval(button, type) {
            const previewItem = button.closest('.preview-item');
            const mediaId = previewItem.dataset.id;
            const inputField = document.querySelector(`.remove-${type === 'photos' ? 'photo' : 'video'}-${mediaId}`);
            
            if (inputField) {
                if (inputField.disabled) {
                    inputField.disabled = false;
                    previewItem.style.opacity = '0.5';
                    previewItem.style.filter = 'grayscale(0.5)';
                    button.style.background = '#ec489a';
                } else {
                    inputField.disabled = true;
                    previewItem.style.opacity = '1';
                    previewItem.style.filter = 'none';
                    button.style.background = 'rgba(0, 0, 0, 0.7)';
                }
            }
        }
        
        // Form validation
        document.getElementById('galleryForm').addEventListener('submit', function(e) {
            const name = document.getElementById('name').value.trim();
            if (!name) {
                e.preventDefault();
                alert('Please enter an event name');
                return false;
            }
        });
    </script>
</body>
</html>