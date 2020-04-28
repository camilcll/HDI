<?php require_once(PATH_VIEWS.'header.php');?>


<!--  Zone message d'alerte -->
<?php require_once(PATH_VIEWS.'alert.php');?>

<link href="<?= PATH_CSS ?>settings.css" rel="stylesheet">


<div class="container py-5">
    <form  method="post" action="index.php?page=parametre" name="formParam">
        <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#config">Panneau de configuration</a>
        </li>

        </ul>
        <div class="flex justify-content-center align-items-center">
        <div class="left d-flex justify-content-center">
            <div class="profile">
                <div class="photo">
                    <input type="file" accept="image/*">
                    <div class="photo__helper">
                        <div class="photo__frame photo__frame--circle">
                            <canvas class="photo__canvas"></canvas>
                            <div class="message is-empty">
                                <p class="message--desktop">Drop your photo here or browse your computer.</p>
                                <p class="message--mobile">Tap here to select your picture.</p>
                            </div>
                            <div class="message is-loading">
                                <i class="fa fa-2x fa-spin fa-spinner"></i>
                            </div>
                            <div class="message is-dragover">
                                <i class="fa fa-2x fa-cloud-upload"></i>
                                <p>Drop your photo</p>
                            </div>
                            <div class="message is-wrong-file-type">
                                <p>Only images allowed.</p>
                                <p class="message--desktop">Drop your photo here or browse your computer.</p>
                                <p class="message--mobile">Tap here to select your picture.</p>
                            </div>
                            <div class="message is-wrong-image-size">
                                <p>Your photo must be larger than 350px.</p>
                            </div>
                        </div>
                    </div>

                    <div class="photo__options hide">
                        <div class="photo__zoom">
                            <input type="range" class="zoom-handler">
                        </div><a href="javascript:;" class="remove"><i class="fa fa-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade show active py-4 px-4 ml-3" id="profile">
                <div class="form-label-group m-3">
                    <p>Nom</p>
                    <input type="text" name="nom" id="" class="form-control" placeholder="Nom de l'utilisateur" required autofocus>
                </div>
                <div class="form-label-group m-3">
                    <p>Prenom</p>
                    <input type="text" name="prenom" id="" class="form-control" placeholder="Prenom de l'utilisateur" required autofocus>
                </div>
                <div class="form-label-group m-3">
                    <p>Mail </p>
                    <input type="mail" name="email" id="" class="form-control" placeholder="Adresse mail" required autofocus>
                </div>
            
                
            </div>
            <div class="tab-pane fade py-4 px-4" id="config">
                <div class="form-group-group">
                </div>
            </div>

        </div>
        <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mt-5" type="submit">Modifier</button>

    </form>
</div>
    


<script>/**
 * Profile picture
 * @author Daniel Salvagni <danielsalvagni@gmail.com>
 */

/**
 * Turn the globals into local variables.
 */
(function (window, $, undefined) {
  if (!window.profilePicture) {
    window.profilePicture = profilePicture;
  }

  /**
   * Component
   */
  function profilePicture(cssSelector, imageFilePath, options) {
    var self = this;
    /**
     * Map the DOM elements
     */
    self.element = $(cssSelector);
    self.canvas = $(cssSelector + " .photo__frame .photo__canvas")[0];
    self.photoImg = $(cssSelector + " .photo__frame img");
    self.photoHelper = $(cssSelector + " .photo__helper");
    self.photoLoading = $(cssSelector + " .photo__frame .message.is-loading");
    self.photoOptions = $(cssSelector + " .photo__options");
    self.photoFrame = $(cssSelector + " .photo__frame");
    self.photoArea = $(cssSelector + " .photo");
    self.zoomControl = $(cssSelector + " input[type=range]");
    /**
     * Image info to post to the API
     */
    self.model = {
      imageSrc: null,
      width: null,
      height: null,
      originalWidth: null,
      originalHeight: null,
      y: null,
      x: null,
      zoom: 1,
      cropWidth: null,
      cropHeight: null,
      file: null
    };

    /**
     * Plugin options
     */
    self.options = {};
    /**
     * Plugins defaults
     */
    self.defaults = {};
    self.defaults.imageHelper = true;
    self.defaults.imageHelperColor = "rgba(255,255,255,.90)";
    /**
     * Callbacks
     */
    self.defaults.onChange = null;
    self.defaults.onZoomChange = null;
    self.defaults.onImageSizeChange = null;
    self.defaults.onPositionChange = null;
    self.defaults.onLoad = null;
    self.defaults.onRemove = null;
    self.defaults.onError = null;
    /**
     * Zoom default options
     */
    self.defaults.zoom = {
      initialValue: 1,
      minValue: 0.1,
      maxValue: 2,
      step: 0.01
    };
    /**
     * Image default options
     */
    self.defaults.image = {
      originalWidth: 0,
      originalHeight: 0,
      originaly: 0,
      originalX: 0,
      minWidth: 350,
      minHeight: 350,
      maxWidth: 1000,
      maxHeight: 1000
    };

    /**
     * Zoom controls
     */
    self.zoom = $(cssSelector + " .zoom");

    /**
     * Call the constructor
     */
    init(cssSelector, imageFilePath, options);

    /**
     * Return public methods
     */
    return {
      getData: getData.bind(this),
      getAsDataURL: getAsDataURL.bind(this),
      removeImage: removeImage.bind(this)
    };

    /**
     * Constructor
     * Register all components and options.
     * Can load a preset image
     */
    function init(cssSelector, imageFilePath, options) {
      /**
       * Start canvas
       */
      self.canvas.width = self.photoFrame.outerWidth();
      self.canvas.height = self.photoFrame.outerHeight();
      self.canvasContext = self.canvas.getContext("2d");
      /**
       * Show the right text
       */
      if (isMobile()) {
        self.photoArea.addClass("is-mobile");
      } else {
        self.photoArea.addClass("is-desktop");
      }
      /**
       * Merge the defaults with the user options
       */
      self.options = $.extend({}, self.defaults, options);

      /**
       * Enable/disable the image helper
       */
      if (self.options.imageHelper) {
        registerImageHelper();
      }

      registerDropZoneEvents();
      registerImageDragEvents();
      registerZoomEvents();

      /**
       * Start
       */
      if (imageFilePath) {
        processFile(imageFilePath);
      } else {
        self.photoArea.addClass("photo--empty");
      }
    }

    /**
     * Check if the user's device is a smartphone/tablet
     */
    function isMobile() {
      return navigator.userAgent.match(
        /BlackBerry|Android|iPhone|iPad|iPod|Opera Mini|IEMobile/i
      );
    }

    /**
     * Return the model
     */
    function getData() {
      return this.model;
    }
    /**
     * Set the model
     */
    function setModel(model) {
      self.model = model;
    }
    /**
     * Set the image to a canvas
     */
    function processFile(imageUrl) {
      function isDataURL(s) {
        s = s.toString();
        return !!s.match(isDataURL.regex);
      }
      isDataURL.regex = /^\s*data:([a-z]+\/[a-z]+(;[a-z\-]+\=[a-z\-]+)?)?(;base64)?,[a-z0-9\!\$\&\'\,\(\)\*\+\,\;\=\-\.\_\~\:\@\/\?\%\s]*\s*$/i;

      var image = new Image();
      if (!isDataURL(imageUrl)) {
        image.crossOrigin = "anonymous";
      }
      self.photoArea.addClass("photo--loading");
      image.onload = function () {
        var ratio,
          newH,
          newW,
          w = this.width,
          h = this.height;

        if (
          w < self.options.image.minWidth ||
          h < self.options.image.minHeight
        ) {
          self.photoArea.addClass("photo--error--image-size photo--empty");
          setModel({});

          /**
           * Call the onError callback
           */
          if (typeof self.options.onError === "function") {
            self.options.onError("image-size");
          }

          self.photoArea.removeClass("photo--loading");
          return;
        } else {
          self.photoArea.removeClass("photo--error--image-size");
        }

        self.photoArea.removeClass(
          "photo--empty photo--error--file-type photo--loading"
        );

        var frameRatio =
          self.options.image.maxHeight / self.options.image.maxWidth;
        var imageRatio = self.model.height / self.model.width;

        if (frameRatio > imageRatio) {
          newH = self.options.image.maxHeight;
          ratio = newH / h;
          newW = parseFloat(w) * ratio;
        } else {
          newW = self.options.image.maxWidth;
          ratio = newW / w;
          newH = parseFloat(h) * ratio;
        }
        h = newH;
        w = newW;

        self.model.imageSrc = image;
        self.model.originalHeight = h;
        self.model.originalWidth = w;
        self.model.height = h;
        self.model.width = w;
        self.model.cropWidth = self.photoFrame.outerWidth();
        self.model.cropHeight = self.photoFrame.outerHeight();
        self.model.x = 0;
        self.model.y = 0;
        self.photoOptions.removeClass("hide");
        fitToFrame();
        render();

        /**
         * Call the onLoad callback
         */
        if (typeof self.options.onLoad === "function") {
          self.options.onLoad(self.model);
        }
      };

      image.src = imageUrl;
    }
    /**
     * Remove the image and reset the component state
     */
    function removeImage() {
      self.canvasContext.clearRect(
        0,
        0,
        self.model.cropWidth,
        self.model.cropHeight
      );
      self.canvasContext.save();
      self.photoArea.addClass("photo--empty");
      self.imageHelperCanvasContext.clearRect(
        0,
        0,
        self.imageHelperCanvas.width,
        self.imageHelperCanvas.height
      );
      self.imageHelperCanvasContext.save();
      setModel({});

      /**
       * Call the onRemove callback
       */
      if (typeof self.options.onRemove === "function") {
        self.options.onRemove(self.model);
      }
    }

    /**
     * Register the file drop zone events
     */
    function registerDropZoneEvents() {
      var target = null;
      /**
       * Stop event propagation to all dropzone related events.
       */
      self.element.on(
        "drag dragstart dragend dragover dragenter dragleave drop",
        function (e) {
          e.preventDefault();
          e.stopPropagation();
          e.originalEvent.dataTransfer.dropEffect = "copy";
        }
      );

      /**
       * Register the events when the file is out or dropped on the dropzone
       */
      self.element.on("dragend dragleave drop", function (e) {
        if (target === e.target) {
          self.element.removeClass("is-dragover");
        }
      });
      /**
       * Register the events when the file is over the dropzone
       */
      self.element.on("dragover dragenter", function (e) {
        target = e.target;
        self.element.addClass("is-dragover");
      });
      /**
       * On a file is selected, calls the readFile method.
       * It is allowed to select just one file - we're forcing it here.
       */
      self.element.on("change", "input[type=file]", function (e) {
        if (this.files && this.files.length) {
          readFile(this.files[0]);
          this.value = "";
        }
      });
      /**
       * Handle the click to the hidden input file so we can browser files.
       */
      self.element.on("click", ".photo--empty .photo__frame", function (e) {
        $(cssSelector + " input[type=file]").trigger("click");
      });
      /**
       * Register the remove action to the remove button.
       */
      self.element.on("click", ".remove", function (e) {
        removeImage();
      });
      /**
       * Register the drop element to the container component
       */
      self.element.on("drop", function (e) {
        readFile(e.originalEvent.dataTransfer.files[0]);
      });

      /**
       * Only into the DropZone scope.
       * Read a file using the FileReader API.
       * Validates file type.
       */
      function readFile(file) {
        self.photoArea.removeClass(
          "photo--error photo--error--file-type photo--error-image-size"
        );
        /**
         * Validate file type
         */
        if (!file.type.match("image.*")) {
          self.photoArea.addClass("photo--error--file-type");
          /**
           * Call the onError callback
           */
          if (typeof self.options.onError === "function") {
            self.options.onError("file-type");
          }
          return;
        }

        var reader;
        reader = new FileReader();
        reader.onloadstart = function () {
          self.photoArea.addClass("photo--loading");
        };
        reader.onloadend = function (data) {
          self.photoImg.css({ left: 0, top: 0 });
          var base64Image = data.target.result;
          processFile(base64Image, file.type);
        };
        reader.onerror = function () {
          self.photoArea.addClass("photo--error");
          /**
           * Call the onError callback
           */
          if (typeof self.options.onError === "function") {
            self.options.onError("unknown");
          }
        };
        self.model.file = file;
        reader.readAsDataURL(file);
      }
    }
    /**
     * Register the image drag events
     */
    function registerImageDragEvents() {
      var $dragging, x, y, clientX, clientY;
      if (self.options.imageHelper) {
        self.photoHelper
          .on("mousedown touchstart", dragStart)
          .css("cursor", "move");
      } else {
        self.photoFrame.on("mousedown touchstart", dragStart);
      }

      /**
       * Stop dragging
       */
      $(window).on("mouseup touchend", function (e) {
        if ($dragging) {
          /**
           * Call the onPositionChange callback
           */
          if (typeof self.options.onPositionChange === "function") {
            self.options.onPositionChange(self.model);
          }
          /**
           * Call the onChange callback
           */
          if (typeof self.options.onChange === "function") {
            self.options.onChange(self.model);
          }
        }
        $dragging = null;
      });
      /**
       * Drag the image inside the container
       */
      $(window).on("mousemove touchmove", function (e) {
        if ($dragging) {
          e.preventDefault();
          var refresh = false;
          clientX = e.clientX;
          clientY = e.clientY;
          if (e.touches) {
            clientX = e.touches[0].clientX;
            clientY = e.touches[0].clientY;
          }

          var dy = clientY - y;
          var dx = clientX - x;
          dx = Math.min(dx, 0);
          dy = Math.min(dy, 0);
          /**
           * Limit the area to drag horizontally
           */
          if (self.model.width + dx >= self.model.cropWidth) {
            self.model.x = dx;
            refresh = true;
          }
          if (self.model.height + dy >= self.model.cropHeight) {
            self.model.y = dy;
            refresh = true;
          }
          if (refresh) {
            render();
          }
        }
      });

      function dragStart(e) {
        $dragging = true;
        clientX = e.clientX;
        clientY = e.clientY;
        if (e.touches) {
          clientX = e.touches[0].clientX;
          clientY = e.touches[0].clientY;
        }
        x = clientX - self.model.x;
        y = clientY - self.model.y;
      }
    }
    /**
     * Register the zoom control events
     */
    function registerZoomEvents() {
      self.zoomControl
        .attr("min", self.options.zoom.minValue)
        .attr("max", self.options.zoom.maxValue)
        .attr("step", self.options.zoom.step)
        .val(self.options.zoom.initialValue)
        .on("input", zoomChange);

      function zoomChange(e) {
        self.model.zoom = Number(this.value);
        updateZoomIndicator();
        scaleImage();
        /**
         * Call the onPositionChange callback
         */
        if (typeof self.options.onZoomChange === "function") {
          self.options.onZoomChange(self.model);
        }
      }
    }
    /**
     * Set the image to the center of the frame
     */
    function centerImage() {
      var x = Math.abs(
        self.model.x - (self.model.width - self.model.cropWidth) / 2
      );
      var y = Math.abs(
        self.model.y - (self.model.height - self.model.cropHeight) / 2
      );
      x = self.model.x - x;
      y = self.model.y - y;
      x = Math.min(x, 0);
      y = Math.min(y, 0);

      if (self.model.width + x < self.model.cropWidth) {
        /**
         * Calculates to handle the empty space on the right side
         */
        x = Math.abs(self.model.width - self.model.cropWidth) * -1;
      }
      if (self.model.height + y < self.model.cropHeight) {
        /**
         * Calculates to handle the empty space on bottom
         */
        y = Math.abs(self.model.height - self.model.cropHeight) * -1;
      }
      self.model.x = x;
      self.model.y = y;
    }
    /**
     * Calculates the new image's position based in its new size
     */
    function getPosition(newWidth, newHeight) {
      var deltaY =
        (self.model.y - self.model.cropHeight / 2) / self.model.height;
      var deltaX = (self.model.x - self.model.cropWidth / 2) / self.model.width;
      var y = deltaY * newHeight + self.model.cropHeight / 2;
      var x = deltaX * newWidth + self.model.cropWidth / 2;

      x = Math.min(x, 0);
      y = Math.min(y, 0);

      if (newWidth + x < self.model.cropWidth) {
        /**
         * Calculates to handle the empty space on the right side
         */
        x = Math.abs(newWidth - self.model.cropWidth) * -1;
      }
      if (newHeight + y < self.model.cropHeight) {
        /**
         * Calculates to handle the empty space on bottom
         */
        y = Math.abs(newHeight - self.model.cropHeight) * -1;
      }
      return { x: x, y: y };
    }
    /**
     * Resize the image
     */
    function scaleImage() {
      /**
       * Calculates the image position to keep it centered
       */
      var newWidth = self.model.originalWidth * self.model.zoom;
      var newHeight = self.model.originalHeight * self.model.zoom;

      var position = getPosition(newWidth, newHeight);

      /**
       * Set the model
       */
      self.model.width = newWidth;
      self.model.height = newHeight;
      self.model.x = position.x;
      self.model.y = position.y;
      updateZoomIndicator();
      render();

      /**
       * Call the onImageSizeChange callback
       */
      if (typeof self.options.onImageSizeChange === "function") {
        self.options.onImageSizeChange(self.model);
      }
    }

    /**
     * Updates the icon state from the slider
     */
    function updateZoomIndicator() {
      /**
       * Updates the zoom icon state
       */
      if (
        self.model.zoom.toFixed(2) ==
        Number(self.zoomControl.attr("min")).toFixed(2)
      ) {
        self.zoomControl.addClass("zoom--minValue");
      } else {
        self.zoomControl.removeClass("zoom--minValue");
      }
      if (
        self.model.zoom.toFixed(2) ==
        Number(self.zoomControl.attr("max")).toFixed(2)
      ) {
        self.zoomControl.addClass("zoom--maxValue");
      } else {
        self.zoomControl.removeClass("zoom--maxValue");
      }
    }

    /**
     * Resize and position the image to fit into the frame
     */
    function fitToFrame() {
      var newHeight, newWidth, scaleRatio;

      var frameRatio = self.model.cropHeight / self.model.cropWidth;
      var imageRatio = self.model.height / self.model.width;

      if (frameRatio > imageRatio) {
        newHeight = self.model.cropHeight;
        scaleRatio = newHeight / self.model.height;
        newWidth = parseFloat(self.model.width) * scaleRatio;
      } else {
        newWidth = self.model.cropWidth;
        scaleRatio = newWidth / self.model.width;
        newHeight = parseFloat(self.model.height) * scaleRatio;
      }
      self.model.zoom = scaleRatio;

      self.zoomControl
        .attr("min", scaleRatio)
        .attr("max", self.options.zoom.maxValue - scaleRatio)
        .val(scaleRatio);

      self.model.height = newHeight;
      self.model.width = newWidth;
      updateZoomIndicator();
      centerImage();
    }
    /**
     * Update image's position and size
     */
    function render() {
      self.canvasContext.clearRect(
        0,
        0,
        self.model.cropWidth,
        self.model.cropHeight
      );
      self.canvasContext.save();
      self.canvasContext.globalCompositeOperation = "destination-over";
      self.canvasContext.drawImage(
        self.model.imageSrc,
        self.model.x,
        self.model.y,
        self.model.width,
        self.model.height
      );
      self.canvasContext.restore();

      if (self.options.imageHelper) {
        updateHelper();
      }
      /**
       * Call the onChange callback
       */
      if (typeof self.options.onChange === "function") {
        self.options.onChange(self.model);
      }
    }

    /**
     * Updates the image helper attributes
     */
    function updateHelper() {
      var x = self.model.x + self.photoFrame.position().left;
      var y = self.model.y + self.photoFrame.position().top;
      /**
       * Clear
       */
      self.imageHelperCanvasContext.clearRect(
        0,
        0,
        self.imageHelperCanvas.width,
        self.imageHelperCanvas.height
      );
      self.imageHelperCanvasContext.save();
      self.imageHelperCanvasContext.globalCompositeOperation =
        "destination-over";
      /**
       * Draw the helper
       */
      self.imageHelperCanvasContext.beginPath();
      self.imageHelperCanvasContext.rect(
        0,
        0,
        self.imageHelperCanvas.width,
        self.imageHelperCanvas.height
      );
      self.imageHelperCanvasContext.fillStyle = self.options.imageHelperColor;
      self.imageHelperCanvasContext.fill("evenodd");
      /**
       * Draw the image
       */
      self.imageHelperCanvasContext.drawImage(
        self.model.imageSrc,
        x,
        y,
        self.model.width,
        self.model.height
      );
      self.imageHelperCanvasContext.restore();
    }
    /**
     * Creates the canvas for the image helper
     */
    function registerImageHelper() {
      var canvas = document.createElement("canvas");
      canvas.className = "canvas--helper";
      canvas.width = self.photoHelper.outerWidth();
      canvas.height = self.photoHelper.outerHeight();

      self.photoHelper.prepend(canvas);

      self.imageHelperCanvas = canvas;
      self.imageHelperCanvasContext = canvas.getContext("2d");
      self.imageHelperCanvasContext.mozImageSmoothingEnabled = false;
      self.imageHelperCanvasContext.msImageSmoothingEnabled = false;
      self.imageHelperCanvasContext.imageSmoothingEnabled = false;
    }
    /**
     * Return the image cropped as Base64 data URL
     */
    function getAsDataURL(quality) {
      if (!quality) {
        quality = 1;
      }
      return self.canvas.toDataURL(quality);
    }
  }
})(window, jQuery);

$(function () {
  /**
   * DEMO
   */

  var p = new profilePicture(".profile", null, {
    imageHelper: true,
    onRemove: function (type) {
      $(".preview").hide().attr("src", "");
    },
    onError: function (type) {
      console.log("Error type: " + type);
    }
  });

  $("#previewBtn").on("click", function () {
    $(".preview").show().attr("src", p.getAsDataURL());
  });

  $("#uploadBtn").on("click", function () {
    $("#uploadExample").show();
  });
});
</script>


<?php require_once(PATH_VIEWS.'footer.php');?>