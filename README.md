

## 📌 ACTIVITY 4: Authorization with Spatie Laravel Permissions

A **Role-Based Access Control (RBAC)** system built on top of Activity 3, using Spatie Laravel Permissions to manage user roles and permissions with Laravel Policies.

### ✨ New Features
- ✅ Role-based authorization (Admin, Editor)
- ✅ Permission management via Spatie
- ✅ Laravel Policies for Student model
- ✅ Token-based authentication with role checks
- ✅ Granular access control for CRUD operations

### 🔧 Additional Technologies
| Technology | Purpose |
|------------|---------|
| 🔑 Spatie Laravel Permissions | Role & Permission Management |
| 🛡️ Laravel Policies | Authorization Logic |
| 👥 Role-Based Access Control | User Role Management |

---

### 📋 Permission Matrix

| Role | View Students | Create Students | Edit Students | Delete Students |
|------|--------------|-----------------|---------------|-----------------|
| 👑 **Admin** | ✅ | ✅ | ✅ | ✅ |
| ✏️ **Editor** | ✅ | ❌ | ✅ | ❌ |
| 👤 **No Role** | ❌ | ❌ | ❌ | ❌ |

---

### 🧪 Activity 4 — ThunderClient Testing Screenshots

#### 1. 👑 Admin User Testing

**GET All Students (Admin)**
**GET** `http://127.0.0.1:8000/api/students`  
**Headers:** `Authorization: Bearer {admin_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/admin-get-students.png" alt="Admin GET Students" width="80%" />
</p>
<p align="center">
  <em>✅ Admin can view all students (200 OK)</em>
</p>

---

**CREATE Student (Admin)**
**POST** `http://127.0.0.1:8000/api/students`  
**Headers:** `Authorization: Bearer {admin_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/admin-create-student.png" alt="Admin Create Student" width="80%" />
</p>
<p align="center">
  <em>✅ Admin can create new student (201 Created)</em>
</p>

---

**UPDATE Student (Admin)**
**PUT** `http://127.0.0.1:8000/api/students/1`  
**Headers:** `Authorization: Bearer {admin_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/admin-update-student.png" alt="Admin Update Student" width="80%" />
</p>
<p align="center">
  <em>✅ Admin can update student (200 OK)</em>
</p>

---

**DELETE Student (Admin)**
**DELETE** `http://127.0.0.1:8000/api/students/1`  
**Headers:** `Authorization: Bearer {admin_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/admin-delete-student.png" alt="Admin Delete Student" width="80%" />
</p>
<p align="center">
  <em>✅ Admin can delete student (200 OK)</em>
</p>

---

#### 2. ✏️ Editor User Testing

**GET All Students (Editor)**
**GET** `http://127.0.0.1:8000/api/students`  
**Headers:** `Authorization: Bearer {editor_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/editor-get-students.png" alt="Editor GET Students" width="80%" />
</p>
<p align="center">
  <em>✅ Editor can view all students (200 OK)</em>
</p>

---

**CREATE Student (Editor) - FORBIDDEN**
**POST** `http://127.0.0.1:8000/api/students`  
**Headers:** `Authorization: Bearer {editor_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/editor-create-fail.png" alt="Editor Create Fail" width="80%" />
</p>
<p align="center">
  <em>❌ Editor cannot create student (403 Forbidden)</em>
</p>

---

**UPDATE Student (Editor)**
**PUT** `http://127.0.0.1:8000/api/students/1`  
**Headers:** `Authorization: Bearer {editor_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/editor-update-student.png" alt="Editor Update Student" width="80%" />
</p>
<p align="center">
  <em>✅ Editor can update student (200 OK)</em>
</p>

---

**DELETE Student (Editor) - FORBIDDEN**
**DELETE** `http://127.0.0.1:8000/api/students/1`  
**Headers:** `Authorization: Bearer {editor_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/editor-delete-fail.png" alt="Editor Delete Fail" width="80%" />
</p>
<p align="center">
  <em>❌ Editor cannot delete student (403 Forbidden)</em>
</p>

---

#### 3. 👤 No Role User Testing

**GET All Students (No Role) - FORBIDDEN**
**GET** `http://127.0.0.1:8000/api/students`  
**Headers:** `Authorization: Bearer {norole_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/norole-get-fail.png" alt="No Role GET Fail" width="80%" />
</p>
<p align="center">
  <em>❌ User with no role cannot view students (403 Forbidden)</em>
</p>

---

**CREATE Student (No Role) - FORBIDDEN**
**POST** `http://127.0.0.1:8000/api/students`  
**Headers:** `Authorization: Bearer {norole_token}`
<p align="center">
  <img src="./asset/image/screenshot/act4/norole-create-fail.png" alt="No Role Create Fail" width="80%" />
</p>
<p align="center">
  <em>❌ User with no role cannot create student (403 Forbidden)</em>
</p>

---

### 💾 Database Structure (New Tables)

```sql
-- Roles Table (Spatie)
CREATE TABLE roles (
    id INTEGER PRIMARY KEY,
    name VARCHAR(255),
    guard_name VARCHAR(255),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- Permissions Table (Spatie)
CREATE TABLE permissions (
    id INTEGER PRIMARY KEY,
    name VARCHAR(255),
    guard_name VARCHAR(255),
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);

-- Model Has Roles (Pivot)
CREATE TABLE model_has_roles (
    role_id INTEGER,
    model_type VARCHAR(255),
    model_id INTEGER,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

-- Role Has Permissions (Pivot)
CREATE TABLE role_has_permissions (
    permission_id INTEGER,
    role_id INTEGER,
    FOREIGN KEY (permission_id) REFERENCES permissions(id),
    FOREIGN KEY (role_id) REFERENCES roles(id)
);
```

---

### 🚀 How to Run Activity 4

```bash
# 1. Navigate to project
cd "D:\3rd yr bsit 2nd sem files\Integrative Prog. & Tech\Activities\activity_4\liga_activity_4_integ_prog_tools"

# 2. Install dependencies (includes spatie/laravel-permission)
composer install

# 3. Setup environment
copy .env.example .env
php artisan key:generate

# 4. Configure database in .env (SQLite)
DB_CONNECTION=sqlite
# Remove DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 5. Run migrations (includes permission tables)
php artisan migrate

# 6. Seed roles and permissions
php artisan db:seed --class=RolesAndPermissionsSeeder

# 7. Start server
php artisan serve

# 8. Test with ThunderClient using endpoints above
```

---

### 📊 Sample Role Assignments

After seeding, your database contains:

**Roles:**
```json
[
  {"id": 1, "name": "admin"},
  {"id": 2, "name": "editor"}
]
```

**Permissions:**
```json
[
  {"id": 1, "name": "view students"},
  {"id": 2, "name": "create students"},
  {"id": 3, "name": "edit students"},
  {"id": 4, "name": "delete students"}
]
```

**Admin User (ID: 1):**
- Has role: `admin`
- Has all permissions via role

**Editor User (ID: 2):**
- Has role: `editor`
- Has permissions: `view students`, `edit students`

---

## 📁 Folder Structure for Activity 4 Screenshots

Create a new folder for Activity 4 screenshots:
```
asset/image/screenshot/act4/
├── admin-get-students.png
├── admin-create-student.png
├── admin-update-student.png
├── admin-delete-student.png
├── editor-get-students.png
├── editor-create-fail.png
├── editor-update-student.png
├── editor-delete-fail.png
├── norole-get-fail.png
└── norole-create-fail.png
```