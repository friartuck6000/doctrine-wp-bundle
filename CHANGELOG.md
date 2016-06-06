# Changelog

## 0.2.0 (current)
#### Features
- Added a helper class containing constants mapped to the built-in WordPress post statuses.
- Built association mapping between term relationships, taxonomies and terms.
- Explicitly named `SpecificationRepository` (and a few specific subclasses) on each entity.

#### Bugfixes
- Registered missing entity classes in the mapping listener service.

### 0.1.1
#### Bugfixes
- Reverted DI config class name to the standard `Configuration`.

### 0.1.0
#### Initial release
- Imported and mapped WordPress entities.
- Introduced a password manager for encoding and checking WordPress user passwords.
