{{-- ---------------------- Image modal box ---------------------- --}}
<div id="imageModalBox" class="imageModal">
    <span class="imageModal-close">&times;</span>
    <img class="imageModal-content" id="imageModalBoxSrc">
  </div>

  {{-- ---------------------- Delete Modal ---------------------- --}}
  <div class="app-modal" data-name="delete">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="delete" data-modal='0'>
              <div class="app-modal-header">Tem certeza de que deseja excluir?</div>
              <div class="app-modal-body">Você não pode desfazer esta ação</div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Cancelar</a>
                  <a href="javascript:void(0)" class="app-btn a-btn-danger delete">Excluir</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Alert Modal ---------------------- --}}
  <div class="app-modal" data-name="alert">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="alert" data-modal='0'>
              <div class="app-modal-header"></div>
              <div class="app-modal-body"></div>
              <div class="app-modal-footer">
                  <a href="javascript:void(0)" class="app-btn cancel">Cancelar</a>
              </div>
          </div>
      </div>
  </div>
  {{-- ---------------------- Settings Modal ---------------------- --}}
  <div class="app-modal" data-name="settings">
      <div class="app-modal-container">
          <div class="app-modal-card" data-name="settings" data-modal='0'>
              <form id="update-settings" action="{{ route('avatar.update') }}" enctype="multipart/form-data" method="POST">
                  @csrf
                  {{-- <div class="app-modal-header">Update your profile settings</div> --}}
                  <div class="app-modal-body">
                      {{-- Udate profile avatar --}}
                      <div class="avatar av-l upload-avatar-preview"
                      style="background-image: url('{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.Auth::user()->avatar) }}');"
                      ></div>
                      <p class="upload-avatar-details"></p>
                      <label class="app-btn a-btn-primary update" style="background-color:{{$messengerColor}}">
                          Carregar novo
                          <input class="upload-avatar" accept="image/*" name="avatar" type="file" style="display: none" />
                      </label>
                      {{-- Dark/Light Mode  --}}
                      <p class="divider"></p>
                      <p class="app-modal-header">Modo escuro <span class="
                        {{ Auth::user()->dark_mode > 0 ? 'fas' : 'far' }} fa-moon dark-mode-switch"
                         data-mode="{{ Auth::user()->dark_mode > 0 ? 1 : 0 }}"></span></p>
                      {{-- change messenger color  --}}
                      <p class="divider"></p>
                      {{-- <p class="app-modal-header">Change {{ config('chatify.name') }} Color</p> --}}
                      <div class="update-messengerColor">
                            <span class="messengerColor-1 color-btn"></span>
                            <span class="messengerColor-2 color-btn"></span>
                            <span class="messengerColor-3 color-btn"></span>
                            <span class="messengerColor-4 color-btn"></span>
                            <span class="messengerColor-5 color-btn"></span>
                            <br/>
                            <span class="messengerColor-6 color-btn"></span>
                            <span class="messengerColor-7 color-btn"></span>
                            <span class="messengerColor-8 color-btn"></span>
                            <span class="messengerColor-9 color-btn"></span>
                            <span class="messengerColor-10 color-btn"></span>
                      </div>
                  </div>
                  <div class="app-modal-footer">
                      <a onclick="window.location.reload()" class="app-btn a-btn-warning">Cancelar</a>
                      <input type="submit" class="app-btn a-btn-success update" value="Salvar altereções" />
                  </div>
                  <br>
                  <div class="row">
                      <a class="app-btn a-btn-danger" href="{{ route('logout') }}"
                         onclick="event.preventDefault(); $( '#logout-form' ).submit();">
                          Sair
                      </a>
                  </div>
              </form>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
      </div>
  </div>
