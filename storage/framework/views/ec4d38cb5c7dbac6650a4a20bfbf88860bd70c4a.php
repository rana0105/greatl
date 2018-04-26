<!-- Name Form Input -->
<div class="form-group <?php if($errors->has('name')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('name', 'Name'); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']); ?>

    <?php if($errors->has('name')): ?> <p class="help-block"><?php echo e($errors->first('name')); ?></p> <?php endif; ?>
</div>

<div class="form-group <?php if($errors->has('username')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('username', 'Username'); ?>

    <?php echo Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username']); ?>

    <?php if($errors->has('username')): ?> <p class="help-block"><?php echo e($errors->first('username')); ?></p> <?php endif; ?>
</div>

<!-- email Form Input -->
<div class="form-group <?php if($errors->has('email')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('email', 'Email'); ?>

    <?php echo Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']); ?>

    <?php if($errors->has('email')): ?> <p class="help-block"><?php echo e($errors->first('email')); ?></p> <?php endif; ?>
</div>

<!-- password Form Input -->
<div class="form-group <?php if($errors->has('password')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('password', 'Password'); ?>

    <?php echo Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']); ?>

    <?php if($errors->has('password')): ?> <p class="help-block"><?php echo e($errors->first('password')); ?></p> <?php endif; ?>
</div>

<!-- Roles Form Input -->
<div class="form-group <?php if($errors->has('roles')): ?> has-error <?php endif; ?>">
    <?php echo Form::label('roles[]', 'Roles'); ?>

    <?php echo Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control', 'multiple']); ?>

    <?php if($errors->has('roles')): ?> <p class="help-block"><?php echo e($errors->first('roles')); ?></p> <?php endif; ?>
</div>

<!-- Permissions -->
<?php if(isset($user)): ?>
    <?php echo $__env->make('shared._permissions', ['closed' => 'true', 'model' => $user ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>