<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerHVqGKvt\srcApp_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerHVqGKvt/srcApp_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerHVqGKvt.legacy');

    return;
}

if (!\class_exists(srcApp_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerHVqGKvt\srcApp_KernelDevDebugContainer::class, srcApp_KernelDevDebugContainer::class, false);
}

return new \ContainerHVqGKvt\srcApp_KernelDevDebugContainer([
    'container.build_hash' => 'HVqGKvt',
    'container.build_id' => 'e29c04b8',
    'container.build_time' => 1564685109,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerHVqGKvt');
