 <!-- Medial MODAL Start -->
    
   <div class="modal fade" id="playerModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle" style="font-size: 20px;font-weight: 500;"><?php //if ($video_type===".mp4"): ?>
                  Watching English 101 Lecture
                    <?php// else: ?>
                      Listening to English 101 Lecture
                  <?php //endif ?></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                 <section id="media-player-wrapper">
  <div class="row">
    <?php// if ($video_type ===".mp4"): ?>
      <div class="col-md-12">
      <div class="card p-2">
        <!-- <h6 class="card-title">Video</h6> -->
        <!-- VIDEO allow="autoplay" -->
        <div class="video-player" id="plyr-video-player">
          <iframe id="ytplayer" width="100%" height="300" style="border:1px solid black;"
            src="lecture_file/Osotechcoding_0036.mp4"
            allowfullscreen controls autoplay="false">
          </iframe>
        </div>
        <!-- VIDEO END -->
      </div>
    </div>
      <?php //else: ?>
         <div class="col-md-12">
      <div class="card p-2">
        <!-- AUDIO -->
        <!-- <h6 class="card-title">Audio</h6> -->
        <audio id="plyr-audio-player" class="audio-player ytplayer" controls>
          <source src="lecture_file/song1.mp3" type="audio/mp3" />
          <source src="lecture_file/song1.mp3" type="audio/mp3" />
        </audio>
        <!-- AUDIO END -->
      </div>
    </div>
    <?php //endif ?>
    
  </div>
 
</section>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Back</span>
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- Media MODAL  END -->