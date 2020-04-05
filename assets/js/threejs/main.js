import * as THREE from '/assets/threejs/build/three.module.js';

const screenContainer = document.getElementById('threejsScreen1');
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
    75,
    screenContainer.offsetWidth / screenContainer.offsetHeight,
    0.1,
    100
    );
const renderer = new THREE.WebGLRenderer();

renderer.setSize(screenContainer.offsetWidth, screenContainer.offsetHeight);

screenContainer.appendChild(renderer.domElement);

const geometry = new THREE.BoxGeometry(1, 1, 1);
const texture = new THREE.TextureLoader().load('/assets/textures/t1.jpg');
const material = new THREE.MeshBasicMaterial({map: texture});
const cube = new THREE.Mesh(geometry, material);
scene.add(cube);

camera.position.z = 5;

function animate() {
    requestAnimationFrame(animate);

    cube.rotation.x += 0.01;
    cube.rotation.y += 0.01;

    renderer.render(scene, camera);
}

animate();