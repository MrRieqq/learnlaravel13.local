<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GTA SA Browser - Prototype</title>
    <style>
        body { margin: 0; overflow: hidden; }
        canvas { display: block; }
        #hud {
            position: fixed; top: 10px; left: 10px;
            color: white; font-family: Arial;
            text-shadow: 1px 1px 2px black;
        }
    </style>
</head>
<body>
<div id="hud">
    <div>Health: <span id="health">100</span></div>
    <div>Money: $<span id="money">0</span></div>
    <div>Wanted: <span id="wanted">0</span>★</div>
</div>

<script type="importmap">
    {
        "imports": {
            "three": "https://unpkg.com/three@0.160.0/build/three.module.js"
        }
    }
</script>

<script type="module">
    import * as THREE from 'three';

    // === СЦЕНА ===
    const scene = new THREE.Scene();
    scene.background = new THREE.Color(0x87CEEB);
    scene.fog = new THREE.Fog(0x87CEEB, 100, 500);

    const camera = new THREE.PerspectiveCamera(
        75, window.innerWidth / window.innerHeight, 0.1, 1000
    );

    const renderer = new THREE.WebGLRenderer({ antialias: true });
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.shadowMap.enabled = true;
    document.body.appendChild(renderer.domElement);

    // === СВЕТ ===
    const ambientLight = new THREE.AmbientLight(0xffffff, 0.5);
    scene.add(ambientLight);

    const sunLight = new THREE.DirectionalLight(0xffffff, 1);
    sunLight.position.set(100, 200, 100);
    sunLight.castShadow = true;
    scene.add(sunLight);

    // === ЗЕМЛЯ (улицы Los Santos) ===
    const groundGeometry = new THREE.PlaneGeometry(1000, 1000);
    const groundMaterial = new THREE.MeshLambertMaterial({ color: 0x555555 });
    const ground = new THREE.Mesh(groundGeometry, groundMaterial);
    ground.rotation.x = -Math.PI / 2;
    ground.receiveShadow = true;
    scene.add(ground);

    // === ЗДАНИЯ (упрощённо) ===
    function createBuilding(x, z, width, height, depth, color) {
        const geometry = new THREE.BoxGeometry(width, height, depth);
        const material = new THREE.MeshLambertMaterial({ color });
        const building = new THREE.Mesh(geometry, material);
        building.position.set(x, height / 2, z);
        building.castShadow = true;
        building.receiveShadow = true;
        scene.add(building);
        return building;
    }

    // Несколько зданий
    createBuilding(50, 50, 20, 40, 20, 0x888888);
    createBuilding(-50, 50, 15, 30, 15, 0x999999);
    createBuilding(50, -50, 25, 50, 25, 0x777777);
    createBuilding(-50, -50, 18, 35, 18, 0xaaaaaa);

    // === ПЕРСОНАЖ (CJ - упрощённо) ===
    const playerGroup = new THREE.Group();

    // Тело
    const bodyGeo = new THREE.BoxGeometry(0.6, 1.2, 0.4);
    const bodyMat = new THREE.MeshLambertMaterial({ color: 0x228B22 });
    const body = new THREE.Mesh(bodyGeo, bodyMat);
    body.position.y = 0.6;
    body.castShadow = true;
    playerGroup.add(body);

    // Голова
    const headGeo = new THREE.SphereGeometry(0.25, 8, 8);
    const headMat = new THREE.MeshLambertMaterial({ color: 0x8B4513 });
    const head = new THREE.Mesh(headGeo, headMat);
    head.position.y = 1.45;
    head.castShadow = true;
    playerGroup.add(head);

    scene.add(playerGroup);

    // === УПРАВЛЕНИЕ ===
    const keys = {};
    const player = {
        x: 0, y: 0, z: 0,
        speed: 0.15,
        rotation: 0,
        health: 100,
        money: 0,
        wanted: 0
    };

    window.addEventListener('keydown', (e) => keys[e.code] = true);
    window.addEventListener('keyup', (e) => keys[e.code] = false);

    // === КАМЕРА (от третьего лица) ===
    const cameraOffset = new THREE.Vector3(0, 5, 10);

    // === ИГРОВОЙ ЦИКЛ ===
    function animate() {
        requestAnimationFrame(animate);

        // Движение
        let moved = false;
        const moveDir = new THREE.Vector3();

        if (keys['KeyW']) { moveDir.z -= 1; moved = true; }
        if (keys['KeyS']) { moveDir.z += 1; moved = true; }
        if (keys['KeyA']) { moveDir.x -= 1; moved = true; }
        if (keys['KeyD']) { moveDir.x += 1; moved = true; }

        if (moved) {
            moveDir.normalize();
            player.x += moveDir.x * player.speed;
            player.z += moveDir.z * player.speed;

            // Поворот персонажа по направлению движения
            player.rotation = Math.atan2(moveDir.x, moveDir.z);
        }

        // Прыжок
        if (keys['Space'] && player.y <= 0) {
            player.y = 0.5;
        }

        // Гравитация
        if (player.y > 0) {
            player.y -= 0.02;
            if (player.y < 0) player.y = 0;
        }

        // Обновление позиции
        playerGroup.position.set(player.x, player.y, player.z);
        playerGroup.rotation.y = player.rotation;

        // Камера следует за игроком
        camera.position.set(
            player.x + cameraOffset.x,
            player.y + cameraOffset.y,
            player.z + cameraOffset.z
        );
        camera.lookAt(player.x, player.y + 1, player.z);

        renderer.render(scene, camera);
    }

    // === РЕСАЙЗ ===
    window.addEventListener('resize', () => {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    });

    animate();

    console.log('GTA SA Browser Prototype loaded');
    console.log('Controls: WASD - move, Space - jump');
</script>
</body>
</html>
