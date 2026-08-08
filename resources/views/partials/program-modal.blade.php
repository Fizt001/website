{{-- MODAL PROGRAM / JURUSAN --}}
<div id="programModal" class="modal-overlay" onclick="if(event.target===this) closeProgramModal()">
    <div class="modal-content">
        <button class="modal-close" onclick="closeProgramModal()"><i class="ri-close-line"></i></button>
        <div class="modal-grid">
            <div class="modal-left">
                <div style="font-size:3rem;margin-bottom:1rem;" id="modalIcon"></div>
                <h3 id="modalTitle"></h3>
                <div class="section-divider" style="margin:1.5rem 0;justify-content:flex-start;"></div>
                <p id="modalDesc"></p>
                <div style="margin-top:2.5rem;">
                    <a href="{{ route('spmb') }}" class="btn-primary" style="display:flex;justify-content:center;align-items:center;gap:0.5rem;"><i class="ri-user-add-line"></i> Daftar Sekarang</a>
                </div>
            </div>
            <div class="modal-right">
                <div class="modal-slider">
                    <button class="modal-slider-btn prev" onclick="changeModalSlide(-1)"><i class="ri-arrow-left-s-line"></i></button>
                    <button class="modal-slider-btn next" onclick="changeModalSlide(1)"><i class="ri-arrow-right-s-line"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.program-card { cursor: pointer; transition: transform 0.3s, box-shadow 0.3s; position: relative; }
.program-card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px rgba(0,0,0,0.1); }
.modal-overlay {
    position: fixed; top: 0; left: 0; width: 100%; height: 100%;
    background: rgba(0,0,0,0.8); backdrop-filter: blur(8px);
    z-index: 99999; display: flex; align-items: center; justify-content: center;
    opacity: 0; pointer-events: none; transition: opacity 0.3s ease;
}
.modal-overlay.show { opacity: 1; pointer-events: auto; }
.modal-content {
    width: 80%; height: 80%; background: var(--bg-primary);
    border-radius: 24px; overflow: hidden; position: relative;
    box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
    transform: scale(0.95) translateY(20px); transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.modal-overlay.show .modal-content { transform: scale(1) translateY(0); }
.modal-close {
    position: absolute; top: 1.5rem; right: 1.5rem; z-index: 10;
    background: rgba(255,255,255,0.9); border: none; width: 44px; height: 44px;
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    font-size: 1.5rem; color: #111; cursor: pointer;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2); transition: transform 0.2s;
}
.modal-close:hover { transform: scale(1.1); }
.modal-grid { display: flex; height: 100%; }
.modal-left { width: 30%; padding: 3.5rem; background: var(--bg-primary); display: flex; flex-direction: column; justify-content: center; overflow-y: auto; border-right: 1px solid var(--card-border); }
.modal-left h3 { font-family: var(--font-heading); font-size: 2.2rem; font-weight: 800; color: var(--text-primary); line-height: 1.2; margin-top: 0; }
.modal-left p { color: var(--text-secondary); font-size: 1.1rem; line-height: 1.8; margin-bottom: 0; }
.modal-right { width: 70%; position: relative; background: #000; overflow: hidden; }
.modal-slider { width: 100%; height: 100%; position: relative; }
.modal-slide { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: contain; opacity: 0; transition: opacity 0.5s ease-in-out; }
.modal-slide.active { opacity: 1; z-index: 1; }
.modal-slider-btn {
    position: absolute; top: 50%; transform: translateY(-50%); z-index: 5;
    background: rgba(255,255,255,0.2); backdrop-filter: blur(4px);
    border: none; width: 56px; height: 56px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.75rem; color: white; cursor: pointer; transition: background 0.2s, transform 0.2s;
}
.modal-slider-btn:hover { background: rgba(255,255,255,0.4); transform: translateY(-50%) scale(1.1); }
.modal-slider-btn.prev { left: 1.5rem; }
.modal-slider-btn.next { right: 1.5rem; }

@media (max-width: 992px) {
    .modal-content { width: 95%; height: 95%; flex-direction: column; }
    .modal-grid { flex-direction: column; }
    .modal-left { width: 100%; height: auto; padding: 2rem; border-right: none; border-bottom: 1px solid var(--card-border); flex-shrink: 0; }
    .modal-right { width: 100%; flex-grow: 1; }
    .modal-left h3 { font-size: 1.75rem; }
    .modal-slider-btn { width: 44px; height: 44px; font-size: 1.25rem; }
}
</style>

<script>
let currentModalSlide = 0;
let modalSlides = [];
let slideInterval;

const programsData = @json($programs);

function openProgramModal(id) {
    const program = programsData.find(p => p.id === id);
    if (!program) return;
    
    document.getElementById('modalTitle').innerText = program.title;
    document.getElementById('modalDesc').innerText = program.description;
    
    if (program.image_icon) {
        document.getElementById('modalIcon').innerHTML = `<img src="{{ Storage::url('') }}${program.image_icon}" alt="Logo" style="width:80px;height:80px;object-fit:contain;border-radius:12px;">`;
    } else {
        document.getElementById('modalIcon').innerText = program.icon;
    }
    
    let images = program.galleries ? program.galleries.map(g => '{{ Storage::url('') }}' + g.image_path) : [];
    if (images.length === 0) {
        images = [
            'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?auto=format&fit=crop&q=80&w=1200&h=800',
            'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&q=80&w=1200&h=800'
        ];
    }
    
    const sliderContainer = document.querySelector('.modal-slider');
    sliderContainer.querySelectorAll('.modal-slide').forEach(el => el.remove());
    
    images.forEach((src, idx) => {
        const img = document.createElement('img');
        img.src = src;
        img.className = 'modal-slide' + (idx === 0 ? ' active' : '');
        sliderContainer.insertBefore(img, sliderContainer.firstChild); 
    });

    document.getElementById('programModal').classList.add('show');
    document.body.style.overflow = 'hidden';
    
    modalSlides = Array.from(document.querySelectorAll('.modal-slide')).reverse();
    currentModalSlide = 0;
    updateModalSlider();
    
    clearInterval(slideInterval);
    slideInterval = setInterval(() => { changeModalSlide(1); }, 4000);
}

function closeProgramModal() {
    document.getElementById('programModal').classList.remove('show');
    document.body.style.overflow = '';
    clearInterval(slideInterval);
}

function changeModalSlide(direction) {
    currentModalSlide += direction;
    if (currentModalSlide >= modalSlides.length) currentModalSlide = 0;
    if (currentModalSlide < 0) currentModalSlide = modalSlides.length - 1;
    updateModalSlider();
}

function updateModalSlider() {
    modalSlides.forEach((slide, index) => {
        if (index === currentModalSlide) {
            slide.classList.add('active');
        } else {
            slide.classList.remove('active');
        }
    });
}
</script>
