<template>
  <div class="p-4 cb">
    <div class="grid grid-cols-2 gap-2">
      <div class="flex justify-center items-center max-h-[800px]">
        <!-- Fabric.js canvas -->
        <canvas ref="canvas" width="600" height="800"
          class="border border-gray-200 dark:border-gray-700 rounded-lg"></canvas>
      </div>
      <div>
        <!-- Controls for adding images and text -->
        <div class="grid grid-cols-2 bg-gray-50 dark:bg-slate-900 shadow-md rounded-lg p-4">
          <div class="col-span-2">
            Upload Images
          </div>
          <div class="mt-4">
            <input type="file" @change="addImage" accept="image/*"
              class="border p-2 rounded-md bg-white text-black dark:bg-slate-900 dark:text-white dark:border-gray-600" />
          </div>
          <div class="col-span-2 mt-10">
            Add Your Preferred Texts
          </div>
          <div class="mt-4 mr-2">
            <input type="text" v-model="textInput" placeholder="Enter text"
              class="border p-2 rounded-md w-full bg-white text-black dark:bg-slate-900 dark:text-white dark:border-gray-600" />
          </div>
          <div class="mt-4">
            <button type="button" @click="addText"
              class="bg-sky-500 text-white dark:text-gray-800 py-2 px-4 rounded-md hover:bg-sky-400 font-bold">Add
              Text</button>
          </div>
          <div class="mt-10 col-span-2">
            Available Dynamic Fields
          </div>
          <div class="flex space-x-2 mt-4 col-span-2">
            <div>
              <div
                class="inline-flex justify-center items-center py-1.5 px-3 text-md font-medium text-gray-500 bg-gray-100 rounded-md hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white cursor-pointer">
                <span class="w-full text-center">Course Name</span>
              </div>
            </div>
            <div>
              <div
                class="inline-flex justify-center items-center py-1.5 px-3 text-md font-medium text-gray-500 bg-gray-100 rounded-md hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white cursor-pointer">
                <span class="w-full text-center">Student Name</span>
              </div>
            </div>
            <div>
              <div
                class="inline-flex justify-center items-center py-1.5 px-3 text-md font-medium text-gray-500 bg-gray-100 rounded-md hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white cursor-pointer">
                <span class="w-full text-center">Date of Completion</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Tools sidebar (visible only when an object is selected) -->
        <div v-if="selectedObject" class="tools-sidebar h-auto bg-gray-50 dark:bg-slate-900 shadow-md rounded-lg p-4 my-10 transition-all duration-500 ease-in-out">

          <!-- Conditional rendering based on object type -->
          <div v-if="selectedObject.type === 'text'">
            <!-- Text color picker -->
            <div class="mb-4">
              <label for="color-picker" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Text Color</label>
              <input id="color-picker" type="color" @change="changeTextColor($event.target.value)"
                class="border p-2 rounded-md w-full mt-4" />
            </div>

            <!-- Font family selector -->
            <div class="mb-4">
              <label for="font-selector" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Font Family</label>
              <select id="font-selector" v-model="selectedFont" @change="changeFont"
                class="border p-2 rounded-md w-full mt-4 bg-white text-black dark:bg-slate-900 dark:text-white dark:border-gray-600">
                <option value="Arial">Arial</option>
                <option value="Courier New">Courier New</option>
                <option value="Georgia">Georgia</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Verdana">Verdana</option>
              </select>
            </div>

            <!-- Text formatting buttons -->
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Formatting</label>
              <div class="flex space-x-2 mt-4">
                <button type="button" @click="toggleBold" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md"><b>Bold</b></button>
                <button type="button" @click="toggleItalic" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md"><em>Italic</em></button>
                <button type="button" @click="toggleUnderline" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md"><u>Underline</u></button>
              </div>
            </div>

            <!-- Text alignment buttons -->
            <div class="mb-4">
              <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Alignment</label>
              <div class="flex space-x-2 mt-4">
                <button type="button" @click="alignLeft" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md">Left</button>
                <button type="button" @click="alignCenter" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md">Center</button>
                <button type="button" @click="alignRight" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md">Right</button>
              </div>
            </div>
          </div>

          <!-- Object manipulation buttons (common for both text and image) -->
          <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-400">Object Actions</label>
            <div class="flex space-x-2 mt-4">
              <button type="button" @click="deleteSelectedObject" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md">Delete</button>
              <button type="button" @click="bringToFront" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md">Front</button>
              <button type="button" @click="sendToBack" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md">Back</button>
              <button type="button" @click="rotateImage" class="text-gray-500 bg-gray-100 hover:text-gray-900 hover:bg-gray-200 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white px-4 py-1.5 rounded-md">Rotate</button>
            </div>
          </div>

          <!-- Range input for resizing the selected object -->
          <div class="mb-4">
            <label for="resize-range" class="block text-sm font-medium text-gray-700 dark:text-gray-400">Resize</label>
            <input type="range" id="resize-range" min="0.1" max="3" step="0.1" v-model="resizeFactor"
              @input="resizeObject" class="w-full" />
          </div>
        </div>
      </div>
    </div>



    <!-- <table class="table-fixed min-w-full leading-normal ">
      <thead>
        <tr>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
            Tag</th>
          <th
            class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
            Usage</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{NAME}</td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Student Name</td>
        </tr>
        <tr>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{COURSE}</td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Course Name</td>
        </tr>
        <tr>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{DATE}</td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">Certificate Date</td>
        </tr>
      </tbody>
    </table> -->
  </div>
</template>

<script>
import { fabric } from 'fabric';
import { FormField, HandlesValidationErrors } from 'laravel-nova';

export default {
  data() {
    return {
      canvas: null, // Fabric.js canvas instance
      textInput: '', // Text input value
      certificate: '', // Canvas JSON data
      resizeFactor: 1, // Initial resize factor
      selectedObject: null, // Selected object in the canvas
      selectedFont: 'Arial', // Default font
      value: this.field.value || '',
    };
  },
  mixins: [FormField, HandlesValidationErrors],
  props: ['resourceName', 'resourceId', 'field'],
  mounted() {
    // Initialize the Fabric.js canvas
    this.canvas = new fabric.Canvas(this.$refs.canvas, {
      selection: true, // Allow object selection
    });

    // Load the canvas from JSON if available
    if (this.value) {
      this.canvas.loadFromJSON(this.value, () => {
        this.canvas.renderAll();
      });
    }

    // Event listener for object selection
    this.canvas.on('selection:created', (e) => {
      this.selectedObject = e.selected[0];
      this.selectedFont = this.selectedObject.fontFamily || 'Arial';
      this.canvas.renderAll();
    });

    this.canvas.on('selection:updated', (e) => {
      this.selectedObject = e.selected[0];
      this.selectedFont = this.selectedObject.fontFamily || 'Arial';
      this.canvas.renderAll();
    });

    // Event listener for clearing selection
    this.canvas.on('selection:cleared', () => {
      this.selectedObject = null;
      this.canvas.renderAll();
    });
  },
  methods: {
    // Add an image to the canvas
    addImage(event) {
      const file = event.target.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
          fabric.Image.fromURL(e.target.result, (img) => {
            img.set({
              left: 100,
              top: 100,
              cornerSize: 10,
              hasRotatingPoint: true, // Allow rotation
              lockUniScaling: false, // Allow non-uniform scaling
              transparentCorners: false, // Solid control corners
            });
            this.canvas.add(img);
          });
        };
        reader.readAsDataURL(file);
      }
    },

    // Add text to the canvas
    addText() {
      if (this.textInput) {
        const textObj = new fabric.Text(this.textInput, {
          left: 100,
          top: 100,
          fontSize: 24,
          fill: 'black',
          cornerSize: 10, // Control corner size
          transparentCorners: false, // Solid control corners
        });
        this.canvas.add(textObj);
        this.textInput = ''; // Clear input field after adding text
      }
    },

    // Change text color
    changeTextColor(color) {
      if (this.selectedObject && this.selectedObject.type === 'text') {
        this.selectedObject.set({ fill: color });
        this.canvas.renderAll();
      }
    },

    // Change font family
    changeFont() {
      if (this.selectedObject && this.selectedObject.type === 'text') {
        this.selectedObject.set('fontFamily', this.selectedFont);
        this.canvas.renderAll();
      }
    },

    // Toggle bold text style
    toggleBold() {
      if (this.selectedObject && this.selectedObject.type === 'text') {
        this.selectedObject.set('fontWeight', this.selectedObject.fontWeight === 'bold' ? 'normal' : 'bold');
        this.canvas.renderAll();
      }
    },

    // Toggle italic text style
    toggleItalic() {
      if (this.selectedObject && this.selectedObject.type === 'text') {
        this.selectedObject.set('fontStyle', this.selectedObject.fontStyle === 'italic' ? 'normal' : 'italic');
        this.canvas.renderAll();
      }
    },

    // Toggle underline text style
    toggleUnderline() {
      if (this.selectedObject && this.selectedObject.type === 'text') {
        this.selectedObject.set('underline', !this.selectedObject.underline);
        this.canvas.renderAll();
      }
    },

    // Align text to the left
    alignLeft() {
      if (this.selectedObject && this.selectedObject.type === 'text') {
        this.selectedObject.set('textAlign', 'left');
        this.canvas.renderAll();
      }
    },

    // Align text to the center
    alignCenter() {
      if (this.selectedObject && this.selectedObject.type === 'text') {
        this.selectedObject.set('textAlign', 'center');
        this.canvas.renderAll();
      }
    },

    // Align text to the right
    alignRight() {
      if (this.selectedObject && this.selectedObject.type === 'text') {
        this.selectedObject.set('textAlign', 'right');
        this.canvas.renderAll();
      }
    },

    // Delete the selected object from the canvas
    deleteSelectedObject() {
      if (this.selectedObject) {
        this.canvas.remove(this.selectedObject);
        this.selectedObject = null;
        this.canvas.renderAll();
      }
    },

    // Bring the selected object to the front
    bringToFront() {
      if (this.selectedObject) {
        this.canvas.bringToFront(this.selectedObject);
      }
    },

    // Send the selected object to the back
    sendToBack() {
      if (this.selectedObject) {
        this.canvas.sendToBack(this.selectedObject);
      }
    },

    // Resize the selected object using the range slider
    resizeObject() {
      if (this.selectedObject) {
        this.selectedObject.scale(this.resizeFactor).setCoords();
        this.canvas.renderAll();
      }
    },

    // Rotate the selected object
    rotateImage() {
      if (this.selectedObject) {
        const rotationAngle = (this.selectedObject.angle || 0) + 45;
        this.selectedObject.rotate(rotationAngle);
        this.canvas.renderAll();
      }
    },

    setInitialValue() {
      this.value = this.field.value || '';
    },

    fill(formData) {
      // Convert the internal value to a JSON string if necessary
      const canvasJson = this.canvas.toJSON();
      this.certificate = JSON.stringify(canvasJson);
      formData.append(this.field.attribute, this.certificate);
    },
  },
};
</script>

<style scoped>
/* Add any custom styles if needed */
.tools-sidebar {
  transition-property: height;
}

.btn-format {
  background-color: #f0f0f0;
  color: #333;
  padding: 8px;
  border-radius: 4px;
  transition: background-color 0.3s ease;
}

.btn-format {
  background-color: #d0d0d0;
}

@media (max-width: 768px) {
  .tools-sidebar {
    width: 100%;
    height: auto;
    position: static;
    box-shadow: none;
    margin-top: 20px;
  }

  .btn-format {
    width: 100%;
    text-align: center;
  }
}
</style>
