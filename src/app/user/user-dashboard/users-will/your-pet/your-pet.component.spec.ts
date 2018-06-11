import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { YourPetComponent } from './your-pet.component';

describe('YourPetComponent', () => {
  let component: YourPetComponent;
  let fixture: ComponentFixture<YourPetComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ YourPetComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(YourPetComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
